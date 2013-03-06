var xmlHttp

function carregaSubCategoria(strid)
{ 
xmlHttp=GetXmlHttpObject()
if (xmlHttp==null)
{
alert ("O browser não suporta HTTP Request")
return
}
var url="gerenciador.ecommerce.util/buscar_sub_categoria.php"
url=url+"?id_util="+strid
xmlHttp.onreadystatechange=stateChange // Chama outra funcao !!
xmlHttp.open("GET",url,true)
xmlHttp.send(null)
}

function stateChange() 
{ 
if (xmlHttp.readyState==4 || xmlHttp.status==200)
{ 
document.getElementById("lista_sub_categoria").innerHTML=xmlHttp.responseText 
} 
}


function GetXmlHttpObject()
{
var xmlHttp=null;
try
{
// Firefox, Opera 8.0+, Safari
xmlHttp=new XMLHttpRequest();
}
catch (e)
{
//Internet Explorer
try
  {
  xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
  }
catch (e)
  {
  xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
}
return xmlHttp;
}