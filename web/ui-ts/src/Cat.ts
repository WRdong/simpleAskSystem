export default class Cat {
    private name: string;
  
    constructor(name: string) {
      this.name = name;
    }
  
    say() {
      console.log(this.name);
    }
  }