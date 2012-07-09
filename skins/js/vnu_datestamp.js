days = new Array(
" Воскресенье"," ПОНЕДЕЛЬНИК"," Вторник"," Среда"," Четверг"," Пятница"," Суббота"
);
months = new Array(
" Января"," Февраля "," Марта "," Апреля "," Мая "," Июня "," Июля "," Августа "," Сентября "," Октября "," Ноября "," Декабря "
);

function renderDate(){
	var mydate = new Date();
	var year = mydate.getYear();
	if (year < 2000) {
		if (document.all)
			year = "19" + year;
		else
			year += 1900;
	}
	var day = mydate.getDay();
	var month = mydate.getMonth();
	var daym = mydate.getDate();
	if (daym < 10)
		daym = "0" + daym;
	var hours = mydate.getHours();
	var minutes = mydate.getMinutes();
	var dn = "";
    
    
	
	if (minutes <= 9)
		minutes = "0" + minutes;
	document.writeln("<p><FONT COLOR=\"#000000\" FACE=\"Verdana,arial,helvetica,sans serif\" size=\"1\"><B>&nbsp;",days[day]," ",daym," ",months[month]," ",year," </B><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <i>",hours,":",minutes,"</i> ",dn,"</FONT></p><BR>");
}

renderDate();