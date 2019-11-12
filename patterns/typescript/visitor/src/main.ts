interface Entity {
  accept: (visitor: Visitor) => void;
}

class Company implements Entity {
  constructor(private name: string) {}

  public get_name = (): string => this.name;

  public accept = (visitor: Visitor) => visitor.visit_company(this);
}

class Department implements Entity {
  constructor(private name: string) {}

  public get_name = (): string => this.name;

  public accept = (visitor: Visitor) => visitor.visit_department(this);
}

class Employee implements Entity {
  constructor(private name: string) {}

  public get_name = (): string => this.name;

  public accept = (visitor: Visitor) => visitor.visit_employee(this);
}

interface Visitor {
  visit_company: (entity: Company) => void;
  visit_department: (entity: Department) => void;
  visit_employee: (entity: Employee) => void;
}

class ConcreteVisitor implements Visitor {
  public visit_company = (company: Company) =>
    console.log(`visiting company => ${company.get_name()}`);
  public visit_department = (department: Department) =>
    console.log(`visiting department => ${department.get_name()}`);
  public visit_employee = (employee: Employee) =>
    console.log(`visiting employee => ${employee.get_name()}`);
}

function main(): void {
  const visitor = new ConcreteVisitor();

  const company = new Company("Netflix");
  const department = new Department("Memory Management");
  const employee = new Employee("John Doe");

  company.accept(visitor);
  department.accept(visitor);
  employee.accept(visitor);
}
main();
