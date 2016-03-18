function prod () { 
  var html = "";
  var htmlx1 = "";
        $.ajax({
            url: 'consultarProductos.php',
            dataType: 'json',
            cache: false,
            success: function(json) {
                $.each(json, function(i, item) {
                     
                   
                    html +='<div class="item">'+
                                '<div class="imgSlider">'+
                                    '<img src="imagenes_herballsfood/'+item.img+'"alt="">'+
                                '</div>'+
                                '<div class="text">'+
                                    '<p class="contenText">'+item.descript+'</p>'+
                                    '<div class="buy">'+
                                        '<div class="textProd">'+
                                            '<p>'+item.nomProd+'</p>'+
                                        '</div>'+
                                        '<div class="price"><p>$'+item.price+'</p></div>'+
                                        '<input class="button" type="submit" value="Buy Now" lel="'+item.id+'"/>'+
                                        '<div class="information"><a href="consultarprod'+item.id+'.php">More Information</a></div>'+
                                    '</div>'+
                                '</div>'+
                            '</div>';
                            
                htmlx1 +='<div class="prod">'+
                                '<img src="imagenes_herballsfood/'+item.img+'"alt="">'+
                                '<div class="nomprod">'+
                                    '<p>'+item.nomProd+'</p>'+
                                '</div>'+ 
                            '</div>';
           
                     
                    }) // end $.each() loop
                    $(".Slider").html(html);
                     $(".prods").html(htmlx1);  
                    
                    $(".Slider").owlCarousel({
 
                        navigation : true, // Show next and prev buttons
                        slideSpeed : 300,
                        paginationSpeed : 400,
                        singleItem:true
                    
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
function initCart(){
    if(!sessionStorage.getItem("cantProd")){
         
        sessionStorage.setItem("cantProd",0);
        grandCant = 0;
        
      
    }else{
        console.log("i am here");
        x1 =sessionStorage.getItem("cantProd");
        grandCant = parseInt(x1);
        updateCart(grandCant);
    }
   
    if(!sessionStorage.getItem("cart")){
          var productInit='{"products":[]}';
            objCart= toObject(productInit);
         sessionStorage.setItem("cart",productInit);
        console.log(objCart);
        
      
    }else{
        console.log("Already Yet");
        //cantidad =  sessionStorage.length();
        var actualProd = sessionStorage.getItem("cart")
        objCart= toObject(actualProd);
        console.log(objCart);
    }
   
}
function toString(value){
     var str = JSON.stringify( value );
    return str;   
}
function saveProduct(value){
sessionStorage.setItem("cart",value);

 grandCant++;
 console.log(grandCant);
 updateCart(grandCant)
}
function toObject(value){
   var cart = JSON.parse(value);
  
   return cart;
}
function updateCart(value){
   
   
    sessionStorage.setItem("cantProd",value);
      
     $(".cantidad").html(value); 
}

function validateProduct(value){
    if(objCart.products.length != 0){
     lel = objCart.products.filter(function (item) { return item});
    var idnewprod = value.id;
    var contador=0;
    var c=0;
        for(c=0;c<=lel.length-1;c++){
            
            
            if(idnewprod == lel[c].id )
            {
            var actualIndex= c;
            objCart.products.splice(actualIndex,1)
            
           
            var newcant = lel[c].cant + 1;
            value.cant = newcant;
            objCart.products.push(value);
            strCart=toString(objCart);
            saveProduct(strCart);
           
              
            }else{
                contador++;
            }
         
            
        }
       
        if(contador == c){
            objCart.products.push(value);
                strCart=toString(objCart);
                saveProduct(strCart);
                contador = 0;
                c = 0;
               
        }
        
    }else{
         objCart.products.push(value);
                strCart=toString(objCart);
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
function setProd(){
    $(".Slider").on("click",".button",function(e){
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
                            id:it.id,
                            product: it.nomProd ,
                            price:parseFloat(it.price),
                            cant:it.cant,
                            img:it.img 
                     }
                     
                    }) // end $.each() loop
                   // $(".Procesos").html(html1);
                  validateProduct(item);
                        
            },
            error: function() {
                console.log("error");
            }
        }); // end ajax call      
     
    });
}
