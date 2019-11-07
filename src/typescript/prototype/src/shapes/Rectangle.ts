import Shape from "./Shape";

export default class Rectangle extends Shape {
  constructor(private width: number, private height: number) {
    super();
  }

  public get_width = (): number => this.width;
  public get_height = (): number => this.height;
  public get_area = (): number => this.width * this.height;

  public static rectangle_from(rectangle: Rectangle): Rectangle {
    const rect = Object.create(this);
    rect.width = rectangle.width;
    rect.height = rectangle.height;
    return rect;
  }

  public clone = (): Shape => Rectangle.rectangle_from(this);
}
