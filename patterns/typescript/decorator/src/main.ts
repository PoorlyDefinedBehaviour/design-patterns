interface Component<T> {
  operation: () => T;
}

class ConcreteComponent implements Component<string> {
  public operation = () => "hello world!";
}

class ToUpperCaseDecorator implements Component<string> {
  constructor(private readonly component: Component<string>) {}

  public operation = () => this.component.operation().toUpperCase();
}

class ToLowerCaseDecorator implements Component<string> {
  constructor(private readonly component: Component<string>) {}

  public operation = () => this.component.operation().toLowerCase();
}

class ToRandomCaseDecorator implements Component<string> {
  constructor(private readonly component: Component<string>) {}

  public operation = () =>
    this.component
      .operation()
      .split("")
      .map((character: string) =>
        Math.random() > 0.5 ? character.toUpperCase() : character
      )
      .join("");
}

function main(): void {
  const component = new ConcreteComponent();

  const upper_case_text = new ToUpperCaseDecorator(component).operation();

  const lower_case_text = new ToLowerCaseDecorator(
    new ToUpperCaseDecorator(component)
  ).operation();

  const random_case_text = new ToRandomCaseDecorator(
    new ToLowerCaseDecorator(component)
  ).operation();

  console.log("upper_case_text", upper_case_text);
  console.log("lower_case_text", lower_case_text);
  console.log("random_case_text", random_case_text);
}
main();
