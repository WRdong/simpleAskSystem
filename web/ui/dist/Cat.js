"use strict";
Object.defineProperty(exports, "__esModule", { value: true });
var Cat = /** @class */ (function () {
    function Cat(name) {
        this.name = name;
    }
    Cat.prototype.say = function () {
        console.log(this.name);
    };
    return Cat;
}());
exports.default = Cat;
