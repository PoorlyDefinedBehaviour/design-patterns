abstract class State {
  constructor(protected context: Context) {}

  public abstract action(): void;
  public abstract next_state(): void;
}

class Context {
  private state: State;

  public set_state(state: State): Context {
    this.state = state;
    return this;
  }

  public execute(): Context {
    this.state.action();
    this.state.next_state();
    return this;
  }
}

class ConcreteStateOne extends State {
  public action(): void {
    console.log("ConcreteStateOne.action()");
  }

  public next_state(): void {
    this.context.set_state(new ConcreteStateTwo(this.context));
  }
}
class ConcreteStateTwo extends State {
  public action(): void {
    console.log("ConcreteStateTwo.action()");
  }

  public next_state(): void {
    this.context.set_state(new ConcreteStateOne(this.context));
  }
}

function main(): void {
  const context = new Context();
  context
    .set_state(new ConcreteStateOne(context))
    .execute()
    .execute()
    .execute();
}
main();
