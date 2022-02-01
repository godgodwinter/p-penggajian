//ternary if example
function getAge(birthYear) {
  return birthYear > 2000 ? "You are not born yet" : "You are " + (2020 - birthYear);
}

//convert number to currency
function convertToCurrency(number) {
  return "$" + number.toFixed(2);
}

//create array and push 3 objects with 3 properties
function createArray() {
  var arr = [];
  arr.push({
    name: "John",
    age: 30,
    city: "New York"
  });
  arr.push({
    name: "Mary",
    age: 25,
    city: "Paris"
  });
  arr.push({
    name: "Bob",
    age: 20,
    city: "London"
  });
  return arr;
}

//if else example
function getAge(birthYear) {
  return birthYear > 2000 ? "You are not born yet" : "You are " + (2020 - birthYear);
}