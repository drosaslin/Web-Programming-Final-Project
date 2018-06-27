var Item = function(newName, newPrice) {
    this.name = newName;
    this.price = newPrice;
};

function addItemToCart(name) {
    var flag;
    for(var n in storage) {
        if(storage[n].name == name) {
            cartItems.push(storage[n]);
            for(var i in cart) {
                if(storage[n] == cart[i])
                    flag = true;
            }
            if(!flag)
                cart.push(storage[n]);
            break;
        }
    }
    display();
}

function itemCount(item) {
    var count = 0;
    for(var n in cartItems) {
        if(item === cartItems[n]) {
            ++count;
        }
    }
    return count;
}

function totalPrice() {
    var total = 0.0;
    for(var n in cartItems) {
        total += cartItems[n].price;
    }
    return total.toFixed(2);
}

function display() {
    var output = " ";
    for(var n in cart) {
        output += "<li>" + cart[n].name + " " + cart[n].price.toFixed(2) + "x" + itemCount(cart[n]) + "</li>";
    }
    output += "<li style='margin-top:10px;'>" + "Total Price: $" + totalPrice() + "</li>";
    console.log(cart);
    $("#cart-items").html(output);
}

var mozarellaPizza = new Item("Mozarella Pizza", 10.00);
var hamPizza = new Item("Ham Pizza", 8.00);
var hawaiianPizza = new Item("Hawaiian Pizza", 12.50);
var combinationPizza = new Item("Combination Pizza", 15.50);
var pepperoniPizza = new Item("Pepperonni Pizza", 10.00);

var storage = [];
storage.push(pepperoniPizza);
storage.push(hamPizza);
storage.push(hawaiianPizza);
storage.push(combinationPizza);
storage.push(mozarellaPizza);


var cart = [];
var cartItems = [];

$(".add-to-cart").click(function(){
    var name = $(this).attr("data-name");
    addItemToCart(name);
});