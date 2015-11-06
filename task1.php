<?php

/*$shapes = [ 
    ['type' => 'circle', 'params' => [...]],
    ['type' => 'circle', 'params' => [...]]
];*/

class Color {
    //����� ������ �� ���������
    private $aRGB = array(0, 0, 0);

	//����� �������� ��� ��������
    public function __construct( $aRGB ) {}
	
	//������ � �������� ��-�������
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
    //���� ������, ����� ������������ ������ ������ Color
    protected $oRGB;
	
	//������� �����
	protected $iSize;
	
	//������� bounding box'� ������, ���������� ������� ������������� ������� drawShape() ������� �������� Color
	protected $iWidth;
	protected $iHeight;
	
	//����� ����� �������� ������ ��� ���������/��������� ������� ����� �������� �������
	//...
	
	//����� ������ ���������� ��������� ������ �������� Color
	abstract public function drawShape() {}
}

class Circle extends Shape {
    //����� ����� ���� ����������������� ����
    private $iRadius; //��������	
	
    //��������� ���� ������� (����, ������� �����, � �.�.)	
	public function __construct( $aParams ) {}
	
    //����� ����� ���� get- set- ������ ��� �����
	//...	
	
	//����������� ��� ����� ���� ������ ����� ��������� � ������� �������� Color
	public function drawShape() {}
}

class Rectangle extends Shape {
    //����� ����� ���� ����������������� ����
	//...

	public function __construct( $aParams ) {} //��������� ���� ������� (����, ������� �����, � �.�.)
	
    //����� ����� ���� get- set- ������ ��� �����
	//...	
	
	//����������� ��� ����� ���� ������ ����� ��������� � ������� �������� Color
	public function drawShape() {}
} 

class Triangle extends Shape {
    //����� ����� ���� ����������������� ����
	//...
	
    //��������� ���� ������� (����, ������� �����, � �.�.)	
	public function __construct( $aParams ) {}
	
    //����� ����� ���� get- set- ������ ��� �����
	//...	
	
	//����������� ��� ����� ���� ������ ����� ��������� � ������� �������� Color
	public function drawShape() {}
}

class Canvas {
    private $iWidth;
	private $iHeight;
	
	//���� ����, ����� ������������ ������ ������ Color
	private $oRGB;
	
	//���������� ������ �������� Circle, Triangle, Rectangle � �.�.
	private $aShapes;
	
	//��������� ������ �������� Color, ��������� ����������� �������� �������� Color �� ����� $this->aShapes
	private $aCanvas;
	
    //true, ���� $this->aCanvas �����,
	//false, ���� ��� ��� � $this->aShapes ��������� ���������
    //����� ��� ������ renderCanvas()	
	private $bStatus; 
	
	//�������� ������� ������ Canvas, �������� ������, ������ ����, ����.
    //��� ��������� ������ �� ��������� ������ � $shapes
	public function __construct( $iWidth, $iHeight, $aRGB ) {}
	
	//����� ����� �������� get- set- ������ ��� ������, ������ � �.�.
	//...
	
	//������, ������� ������� ������� ��������������� ����� � $this->aShapes
	//��������, ����� ������� ������������� �������� �����-�� ��������� ������ �� 'params'
	private function createCircle( $aParams ) {}
	private function createRectangle( $aParams ) {}
	private function createTriangle( $aParams ) {}
	
	//����� ��������� $shapes � ����� ��������������� ������ ������� ������ � $this->Shapes
	public function createShapes( $aShapes ) {
	    foreach( $aShapes as $iKey => $aValue ) {
		    switch( $aValue['type'] ):
                case 'circle':
                    $this->createCircle( $aValue['params'] );
                    break;
                case 'rectangle':
                    $this->createRectangle( $aValue['params'] );
                    break;
               
                //� ����� � ���� ����
                //...				
		}
	}
	
	//����� ����� �������� ������ ��� ����������� (� �.�. �������) ���������/���������� ����� � $this->aShapes
	//����� ������� �� ��� ������ ���� ���������� $this->bStatus = FALSE
	//...
	
	//��� !$this->bStatus �������� � ����� $this->aShapes, ������� ����� drawShape() ������� Color � �������� �� � $this->aCanvas
	//����� ����: $this->bStatus = TRUE
	//��� $this->bStatus �� ������ ������
	private function renderCanvas() {}
	
	//����� ����� �������� ������ ��� ����������� (� �.�. �������) ���������� �������� Color � $this->aCanvas
	//��������, �������� ����� '�����������' �� ������-������ ������ �������� �������� ������ (R) ����� ����� setR() ������� ������� Color
	//...	
	
	//����� �������� ������� renderCanvas(), ����� ���� ������ $this->aCanvas � ��������� Color->getAsArray() ������� ������ �������� ���� [x][y][r, g, b] 
	public function getAsArray() {}
	
	//getAsArray ����� json_encode()
	public function getAsJSON() {}
	
	//����� ������������ getAsArray � ����� ����� GD
	public function getAsJPEG() {}
	public function getAsPNG() {}
	public function getAsGIF() {}
}

//���������� ���-������ ���:
$oCanvas = new Canvas( $iWidth, $iHeight );
header( 'Content-Type: image/jpeg' );
echo $oCanvas->createShapes( $shapes )->getAsJPEG();
exit;  