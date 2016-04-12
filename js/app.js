function prod() {
    
    var html = "";
    var htmlx1 = "";
    $.ajax({
        url: 'consultarProductos.php',
        dataType: 'json',
        cache: false,
        success: function(json) {
            $.each(json, function(i, item) {
                html += '<div class="item">' +
                    '<div class="imgSlider">' +
                    '<img src="imagenes_herballsfood/' + item.img + '"alt="">' +
                    '</div>' +
                    '<div class="text">' +
                    '<p class="contenText">' + item.descript + '</p>' +
                    '<div class="buy">' +
                    '<div class="textProd">' +
                    '<p>' + item.nomProd + '</p>' +
                    '</div>' +
                    '<div class="price"><p>$' + item.price + '</p></div>' +
                    '<input class="button" type="submit" value="Buy Now" lel="' + item.id + '"/>' +
                    '<div class="information"><a href="productInformation.php?codprod=' + item.id + '.php">More Information</a></div>' +
                    '</div>' +
                    '</div>' +
                    '</div>';

                htmlx1 += '<a style="text-decoration:none;" href="productInformation.php?codprod='+ item.id + '"><div class="prod">' +
                    '<img src="imagenes_herballsfood/' + item.img + '"alt="">' +
                    '<div class="nomprod">' +
                    '<p>' + item.nomProd + '</p>' +
                    '</div>' +
                    '</div></a>';
            }) // end $.each() loop
            $(".Slider").html(html);
            $(".prods").html(htmlx1);
            $(".Slider").owlCarousel({
                autoplay: true,
                navigation: true, // Show next and prev buttons
                slideSpeed: 300,
                paginationSpeed: 400,
                singleItem: true
                // "singleItem:true" is a shortcut for:
                // items : 1, 
                // itemsDesktop : false,
                // itemsDesktopSmall : false,
                // itemsTablet: false,
                // itemsMobile : false
            });
        },
        error: function() {
            console.log("error");
        }
    }); // end ajax call     
}
function initCart() {
    if (!sessionStorage.getItem("cantProd")) {

        sessionStorage.setItem("cantProd", 0);
        total=0;


    } else {
        console.log("i am here");
        x1 = sessionStorage.getItem("cantProd");
        total = parseInt(x1);
        updateCart(total);
    }

    if (!sessionStorage.getItem("cart")) {
        var productInit = '{"products":[]}';
        objCart = toObject(productInit);
        sessionStorage.setItem("cart", productInit);
        console.log(objCart);


    } else {
        console.log("Already Yet");
        //cantidad =  sessionStorage.length();
        var actualProd = sessionStorage.getItem("cart")
        objCart = toObject(actualProd);
        console.log(objCart);
    }

}
function toString(value) {
    var str = JSON.stringify(value);
    return str;
}
function saveProduct(value) {
    sessionStorage.setItem("cart", value);
    updateCart(total);
}
function toObject(value) {
    var cart = JSON.parse(value);

    return cart;
}
function updateCart(value) {


    sessionStorage.setItem("cantProd", value);

    $(".cantidad").html(value);
}

function borrar (value){
     if (objCart.products.length != 0) {
        lel = objCart.products.filter(function(item) { return item });
        var idprod = value.id;
        var contador = 0;
        var c = 0;
        xtotal=0;
        for (c = 0; c <= lel.length - 1; c++) {

           
            
                   
            if (idprod == lel[c].id) {
                var actualIndex = c;
                objCart.products.splice(actualIndex, 1)
                strCart = toString(objCart);
                saveProduct(strCart);


            } else {
               
            }

    
        

        }
         lel = objCart.products.filter(function(item) { return item });
        for (var x = 0; x <= lel.length - 1; x++) {
            var newcant = lel[x].cant;
           
         xtotal =xtotal+newcant;
            console.log(newcant); 
        }
        
        if(lel.length==0){
            xtotal=0;
        }else{
            
        
         
        } 

     
    total=xtotal;
     updateCart(total);
    //objCart.products.push(item);
    //strCart=toString(objCart);
    //saveProduct(strCart);

    //lel = objCart.products.filter(function (item) { return item.id == "1" });
    //lel = toObject(lel)
    //lel[0].id = '2'//modificacion  
}
}
function validateProduct(value) {
    if (objCart.products.length != 0) {
        lel = objCart.products.filter(function(item) { return item });
        var idnewprod = value.id;
        var contador = 0;
        var c = 0;
       
        for (c = 0; c <= lel.length - 1; c++) {

           


            if (idnewprod == lel[c].id) {
                var actualIndex = c;
                objCart.products.splice(actualIndex, 1)


                var newcant = lel[c].cant + 1;
                value.cant = newcant;
                objCart.products.push(value);
                strCart = toString(objCart);
                saveProduct(strCart);


            } else {
                contador++;
            }


       

        }

        if (contador == c) {
            objCart.products.push(value);
            strCart = toString(objCart);
            saveProduct(strCart);
            contador = 0;
            c = 0;

        }

    } else {
        objCart.products.push(value);
        strCart = toString(objCart);
        saveProduct(strCart);

    }

    //console.log(item); 
    //objCart.products.push(item);
    //strCart=toString(objCart);
    //saveProduct(strCart);

    //lel = objCart.products.filter(function (item) { return item.id == "1" });
    //lel = toObject(lel)
    //lel[0].id = '2'//modificacion  
}
function setProd() {
    
    $(".Slider").on("click", ".button", function(e) {
        
        e.preventDefault();
        var html1 = "";
        $.ajax({
            url: 'consultarProd.php',
            type: 'get',
            data: {
                'codprod': $(this).attr('lel')
            },
            dataType: 'json',
            cache: false,
            success: function(jsonx) {
                $.each(jsonx, function(i, it) {

                    // html1 += '<div class="modulos proceso" alt="'+it.codProceso+'"><h3>'+it.proceso+'</h3></div>';

                    item = {
                        id: it.id,
                        product: it.nomProd,
                        price: parseFloat(it.price),
                        cant: it.cant,
                        img: it.img
                    }

                }) // end $.each() loop
                // $(".Procesos").html(html1);
                total=total+1;
                console.log(total);
                validateProduct(item);
                 updateCart(total);
                  window.location.href = 'Cart.php';  

            },
            error: function() {
                console.log("error");
            }
        }); // end ajax call      

    });
}



function showItems() {
    lel = objCart.products.filter(function(item) { return item });
    if(lel.length != 0){
        var items ="";
        var cantidad ="";
        grantotal=0;
        for (var y = 0; y <= lel.length-1; y++) {
            
        for(var b=1; b<=10;b++){
            
            if(b != parseInt(lel[y].cant)){
             cantidad += '<option alt="'+y+'"  value="'+b+'">'+b+'</option>';  
            }else{
                 cantidad += '<option alt="'+y+'" selected value="'+b+'">'+b+'</option>';  
            }
        }
                var subtotal=parseFloat(lel[y].price)*parseInt(lel[y].cant);
                grantotal = grantotal + subtotal;
                 items = items +  '<div class="itemComprado">'+
                                    '<div class="delete" alt="'+y+'">X' +
                                    '</div>' +  
                                    '<div class="itemImg">' +
                                        '<img src="imagenes_herballsfood/'+lel[y].img+'" alt="">' +
                                    '</div>' +
                                    '<div class="itemNombre">' +
                                        '<p>'+lel[y].product+'</p>' +
                                    '</div>' +
                                    '<div class="itemCantidad">' +
                                        '<select name="itemCantidad" class="cants" >' +
                                            cantidad
                                           +
                                        '</select>' +
                                    '</div>' +
                                    '<div class="itemPrice">' +
                                        '<p>$'+lel[y].price+'</p>' +
                                    '</div>' +
                                    '<div class="itemSubt">' +
                                        '<p>$'+subtotal.toFixed(2)+'</p>' +
                                    '</div>' +
                                '</div>';
                                
                                $("#cartAll").html(items);
                                cantidad="";
                                
        }
    }else{
        var message = '<center><p class="message">The cart is empty</p></center>';
        $("#cartAll").html(message);
        $(".grid").hide();
    }
    tax=0.07;
    totax=0;
    xto=grantotal.toFixed(2);
    taxt=xto*tax;
    
    totalx=parseFloat(xto)+parseFloat(taxt);
    xt=totalx.toFixed(2);
     $(".subtotal").append(xto);
     $(".total").append(xt);
    console.log("total master"+taxt);
}

function showItems2() {
    lel = objCart.products.filter(function(item) { return item });
    if(lel.length != 0){
        var items ="";
        
        for (var y = 0; y <= lel.length-1; y++) {
            
    
                subtprod=lel[y].price*lel[y].cant;
                 items = items +  '<div class="itemComprado">'+
                                     
                                    '<div class="itemImg">' +
                                        '<img src="imagenes_herballsfood/'+lel[y].img+'" alt="">' +
                                    '</div>' +
                                    '<div class="itemNombre">' +
                                        '<p>'+lel[y].product+'</p>' +
                                    '</div>' +
                                    '<div class="itemCantidad">' +
                                        '' +
                                           lel[y].cant
                                           +
                                        '' +
                                    '</div>' +
                                    '<div class="itemPrice">' +
                                        '<p>$'+lel[y].price+'</p>' +
                                    '</div>' +
                                    '<div class="itemSubt">' +
                                        '<p>$'+subtprod.toFixed(2)+'</p>' +
                                    '</div>' +
                                '</div>';
                                
                                $("#cartAll").html(items);
                                cantidad="";
                                
        }
    }else{
        var message = '<center><p class="message">The cart is empty</p></center>';
        $("#cartAll").html(message);
        $(".grid").hide();
    }
  
     $(".subtotal").append(sessionStorage.getItem("subtotal"));
     $(".total").append(sessionStorage.getItem("total"));
    
}
  


function validateProductCart(value) {
    if (objCart.products.length != 0) {
        lel = objCart.products.filter(function(item) { return item });
        var idnewprod = value.id;
        var contador = 0;
        var c = 0;
        xtotal=0;
        for (c = 0; c <= lel.length - 1; c++) {

           
            
                   
            if (idnewprod == lel[c].id) {
                var actualIndex = c;
                objCart.products.splice(actualIndex, 1)


         
                objCart.products.push(value);
                strCart = toString(objCart);
                saveProduct(strCart);


            } else {
                contador++;
            }



        var newcant = lel[c].cant;
           xtotal =newcant+xtotal;

        }

        if (contador == c) {
            objCart.products.push(value);
            strCart = toString(objCart);
            saveProduct(strCart);
            contador = 0;
            c = 0;

        }

    } else {
        objCart.products.push(value);
        strCart = toString(objCart);
        saveProduct(strCart);

    }
    total=xtotal;
     updateCart(total);
    //objCart.products.push(item);
    //strCart=toString(objCart);
    //saveProduct(strCart);

    //lel = objCart.products.filter(function (item) { return item.id == "1" });
    //lel = toObject(lel)
    //lel[0].id = '2'//modificacion  
}

function buscarZip (value){
    var client = new XMLHttpRequest();
    client.open("GET", 'http://api.zippopotam.us/us/'+value+'', true);
    client.onreadystatechange = function() {
        if(client.readyState == 4) {
            jsonzip=client.responseText;
            
            zips=JSON.parse(jsonzip);
            ciudad=zips.places[0]["place name"];
            state=zips.places[0]["state"];
            $(".city").val(ciudad);
            $(".state").val(state); 
        };
    };

    client.send();
}
