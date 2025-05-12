var currentDate = new Date();
var day=currentDate.getDate();
var month=currentDate.getMonth()+1;
var monthName;
var hours= currentDate.getHours();
var mins=currentDate.getMinutes();
var secs=currentDate.getSeconds();
var strToAppend;
 if (hours>12){
 	hours1="0"+(hours-12);
 	strToAppend="PM"

 }else if (hours<12){
 	hours1="0"+hours;
 	strToAppend="AM";

 }else{
 	hours1=hours;
 	strToAppend="PM";
 }
 if(mins<10)
 	mins="0"+mins;
 if (secs<10)
 	secs="0"+secs;
 switch(month){
 	case1:
 	monthName="january";
 	break;
 		case2:
 	monthName="february";
 	break;
 	case3:
 	monthName="march";
 	break;
 	case4:
 	monthName="april";
 	break;
 	case5:
 	monthName="may";
 	break;
 	case6:
 	monthName="june";
 	break;
 	case7:
 	monthName="july";
 	break;
 	case8:
 	monthName="august";
 	break;
 	case9:
 	monthName="september";
 	break;
 	case10:
 	monthName="october";
 	break;
 	case11:
 	monthName="november";
 	break;
 	case12:
 	monthName="december";
 	break;
 }
 var year=currentDate.getFullYear();
 var myString ="Today is"+day+"-"+monthName+"-"+year+"</br>current time is "+hours1+":"+mins+":"+secs+" "+strToAppend+".</br";
 document.write(myString);
 document.write("</br");


