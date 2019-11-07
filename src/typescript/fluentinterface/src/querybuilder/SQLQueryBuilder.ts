export default class SQLQueryBuilder {
  private query: string = "";

  public select(fields: string): SQLQueryBuilder {
    this.query += `SELECT ${fields}`;
    return this;
  }

  public from(table: string): SQLQueryBuilder {
    this.query += ` FROM ${table}`;
    return this;
  }

  public where(predicate: string): SQLQueryBuilder {
    this.query += ` WHERE ${predicate}`;
    return this;
  }

  public unwrap(): string {
    const result = this.query;
    this.query = "";
    return result;
  }
}
