function getcss(cssfile){

loadcss = document.createElement('link')

loadcss.setAttribute("rel", "stylesheet")

loadcss.setAttribute("type", "text/css")

loadcss.setAttribute("href", cssfile)

document.getElementsByTagName("head")[0].appendChild(loadcss)

}

if(screen.width < '400') 
{
getcss('css/iphone.css') 
}

else if(screen.width <= '699') 
{
getcss('css/css-mobile.css') 
}

else if(screen.width >= '700' && screen.width < '1024') 
{
getcss('css/800.css') 
}


else if(screen.width > '700' && screen.width < '1200') 
{
getcss('css/1024.css') 
}


else if(screen.width >= '1200' && screen.width < '1599')
{
getcss('css/1200.css')
}

else if(screen.width >= '1600' && screen.width < '1920')
{
getcss('css/1600.css')
}

else if(screen.width >= '1920')
{
getcss('css/1920.css')
}