import Rectangle from "./shapes/Rectangle";
import Circle from "./shapes/Circle";
import Shape from "./shapes/Shape";

function main(): void {
  const rectangle = new Rectangle(10, 10);
  const circle = new Circle(20);

  const shapes: Shape[] = Array(10)
    .fill(null)
    .map(_ => (Math.random() > 0.5 ? rectangle.clone() : circle.clone()));
}
main();
