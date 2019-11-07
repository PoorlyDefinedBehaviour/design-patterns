import Shape from "./Shape";

export default class Circle extends Shape {
  constructor(private radius: number) {
    super();
  }

  public get_area = (): number => Math.PI * this.radius ** 2;
  public get_radius = (): number => this.radius;

  public static Circle_from(Circle: Circle): Circle {
    const circle = Object.create(this);
    circle.radius = Circle.radius;
    return circle;
  }

  public clone = (): Shape => Circle.Circle_from(this);
}
