function savesel(doc)
{
    if(document.selection)
    {                
        doc.sel = document.selection.createRange().duplicate();
    }               
}

function click_url()
{
    var url = prompt('Введите URL ссылки');
	if(url)
        click_bb('text', 'url='+url, 'url')
}


function click_bb(aid, Tag, Close)
{
    var Open = '[' + Tag + ']';
	
	if(!Close)
        var Close = '[/' + Tag + ']';
	else
	    Close = '[/' + Close + ']';
	
    var doc = document.getElementById(aid);
    doc.focus();
    
    if(Tag == 'link')
    {
        var Open = '[' + Tag + ']http://www.';
    }
    
    if(window.attachEvent && navigator.userAgent.indexOf('Opera') === -1) 
    {                                        
        var s = doc.sel;  
        
        if(s)
        {                                  
            var l = s.text.length;
            s.text = Open + s.text + Close;
            s.moveEnd("character", -Close.length);
            s.moveStart("character", -l);                                           
            s.select();                
         }
    } 
    else 
    {                                              
         var ss = doc.scrollTop;
         sel1 = doc.value.substr(0, doc.selectionStart);
         sel2 = doc.value.substr(doc.selectionEnd);
         sel = doc.value.substr(doc.selectionStart, doc.selectionEnd - doc.selectionStart);                                              
         doc.value = sel1 + Open + sel + Close + sel2;
         doc.selectionStart = sel1.length + Open.length;
         doc.selectionEnd = doc.selectionStart + sel.length;
         doc.scrollTop = ss;                                             
    } 
    
    return false;
}

function click_sm(aid,smile)
{
    var sm ='[' + smile + ']';      
    var doc = document.getElementById(aid);
    doc.focus();
    
    if(window.attachEvent && navigator.userAgent.indexOf('Opera') === -1) 
    {                                        
        var s = doc.sel;  
        
        if(s)
        {                                  
            var l = s.text.length;
            s.text = sm + s.text;
            s.moveStart("character", -l);                                           
            s.select();                
         }
    } 
    else 
    {                                              
         var ss = doc.scrollTop;
         sel1 = doc.value.substr(0, doc.selectionStart);
         sel = doc.value.substr(doc.selectionStart, doc.selectionEnd - doc.selectionStart);                                              
         doc.value = sel1 + sm+ sel;
         doc.selectionStart = sel1.length + sm.length;
         doc.selectionEnd = doc.selectionStart + sel.length;
         doc.scrollTop = ss;                                             
    } 
    
    return false;
}


function change(id, img)
{ 
    document.getElementById(id).src = irb_bb_path + img + '.gif';
} 