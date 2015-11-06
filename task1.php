<?php

/*$shapes = [ 
    ['type' => 'circle', 'params' => [...]],
    ['type' => 'circle', 'params' => [...]]
];*/

class Color {
    //Пусть черный по умолчанию
    private $aRGB = array(0, 0, 0);

	//Можно поменять при создании
    public function __construct( $aRGB ) {}
	
	//Задать и получить по-разному
    public function setR() {}
    public function setG() {}
    public function setB() {}
    public function getR() {}
    public function getG() {}
    public function getB() {}
    public function setAsArray() {}
    public function getAsArray() {} 	
}

abstract class Shape {
    //Цвет фигуры, можно использовать объект класса Color
    protected $oRGB;
	
	//Толщина линий
	protected $iSize;
	
	//Размеры bounding box'а фигуры, определяют размеры возвращаемого методом drawShape() массива объектов Color
	protected $iWidth;
	protected $iHeight;
	
	//Здесь можно добавить методы для изменения/получения свойств после создания объекта
	//...
	
	//Метод должен возвращать двумерный массив объектов Color
	abstract public function drawShape() {}
}

class Circle extends Shape {
    //Здесь могут быть фигуроспецифичные поля
    private $iRadius; //Например	
	
    //Заполняем поля данными (цвет, толщина линий, и т.д.)	
	public function __construct( $aParams ) {}
	
    //Здесь могут быть get- set- методы для полей
	//...	
	
	//Специфичный для этого типа фигуры метод отрисовки в массиве объектов Color
	public function drawShape() {}
}

class Rectangle extends Shape {
    //Здесь могут быть фигуроспецифичные поля
	//...

	public function __construct( $aParams ) {} //Заполняем поля данными (цвет, толщина линий, и т.д.)
	
    //Здесь могут быть get- set- методы для полей
	//...	
	
	//Специфичный для этого типа фигуры метод отрисовки в массиве объектов Color
	public function drawShape() {}
} 

class Triangle extends Shape {
    //Здесь могут быть фигуроспецифичные поля
	//...
	
    //Заполняем поля данными (цвет, толщина линий, и т.д.)	
	public function __construct( $aParams ) {}
	
    //Здесь могут быть get- set- методы для полей
	//...	
	
	//Специфичный для этого типа фигуры метод отрисовки в массиве объектов Color
	public function drawShape() {}
}

class Canvas {
    private $iWidth;
	private $iHeight;
	
	//Цвет фона, можно использовать объект класса Color
	private $oRGB;
	
	//Одномерный массив объектов Circle, Triangle, Rectangle и т.д.
	private $aShapes;
	
	//Двумерный массив объектов Color, результат объединения массивов объектов Color из фигур $this->aShapes
	private $aCanvas;
	
    //true, если $this->aCanvas готов,
	//false, если нет или в $this->aShapes произошли изменения
    //нужно для метода renderCanvas()	
	private $bStatus; 
	
	//Создание объекта класса Canvas, задается высота, ширина цвет, фона.
    //Эти параметры должны бы приходить вместе с $shapes
	public function __construct( $iWidth, $iHeight, $aRGB ) {}
	
	//Здесь можно добавить get- set- методы для ширины, высоты и т.д.
	//...
	
	//Методы, которые создают объекты соответствующих фигур в $this->aShapes
	//Возможно, перед вызовом конструкторов проводят какую-то обработку данных из 'params'
	private function createCircle( $aParams ) {}
	private function createRectangle( $aParams ) {}
	private function createTriangle( $aParams ) {}
	
	//Метод принимает $shapes и через соответствующие методы создает фигуры в $this->Shapes
	public function createShapes( $aShapes ) {
	    foreach( $aShapes as $iKey => $aValue ) {
		    switch( $aValue['type'] ):
                case 'circle':
                    $this->createCircle( $aValue['params'] );
                    break;
                case 'rectangle':
                    $this->createRectangle( $aValue['params'] );
                    break;
               
                //И далее в этом духе
                //...				
		}
	}
	
	//Здесь можно добавить методы для манипуляции (в т.ч. массово) объектами/свойствами фигур в $this->aShapes
	//После каждого из них должен быть установлен $this->bStatus = FALSE
	//...
	
	//При !$this->bStatus проходит в цикле $this->aShapes, получая через drawShape() массивы Color и совмещая их с $this->aCanvas
	//После чего: $this->bStatus = TRUE
	//При $this->bStatus не делает ничего
	private function renderCanvas() {}
	
	//Здесь можно добавить методы для манипуляции (в т.ч. массово) свойствами объектов Color в $this->aCanvas
	//Например, поменять всему 'изображению' по какому-нибудь закону значение красного канала (R) через метод setR() каждого объекта Color
	//...	
	
	//Метод вызывает сначала renderCanvas(), после чего обходя $this->aCanvas и используя Color->getAsArray() вернуть массив значений вида [x][y][r, g, b] 
	public function getAsArray() {}
	
	//getAsArray через json_encode()
	public function getAsJSON() {}
	
	//Могут использовать getAsArray и затем через GD
	public function getAsJPEG() {}
	public function getAsPNG() {}
	public function getAsGIF() {}
}

//Применение как-нибудь так:
$oCanvas = new Canvas( $iWidth, $iHeight );
header( 'Content-Type: image/jpeg' );
echo $oCanvas->createShapes( $shapes )->getAsJPEG();
exit;  