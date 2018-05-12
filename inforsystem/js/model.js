// onload=function(){
//     var  oa=document.querySelector('#username');
//     // console.log(1);
//     // console.log(oa);
//     oa.innerHTML=getCookie("username");
//     var x=getXml("xml/basefile.xml","stufile");
//     var username=getCookie("username");
//     var op=document.querySelectorAll('li p');
//     // alert(username);
//     for(var i=0;i<x.length;i++){
//         if(x[i].getElementsByTagName('stucount')[0].innerHTML===username){

//             for(var j=3,m=0;j<11*4;j+=4,m++){
//                 op[m].innerHTML=x[i].childNodes[j].innerHTML;
//             }
//             break;
//         }else{
//             // alert(x[i].getElementsByTagName('stuname')[0].innerHTML);
//         }
//     }
// }

/*
*
* create 2018 5 7
* create by kangyong
*
*
*
*
* */
function FN() {

}
FN.prototype = {
    constructor: FN,
    ajax: function (url, sendValue) {
        var p = new Promise(function (success, failed) {

            var ajax;
            if (XMLHttpRequest) {
                ajax = new XMLHttpRequest();
            } else {
                ajax = new ActiveXObject("Microsoft.XMLHTTP");     //IE
            }
            var method = "POST";
            ajax.open(method,url);
            ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            ajax.send(sendValue);
            ajax.onreadystatechange = function () {
                if (ajax.readyState === 4 && ajax.status === 200) {
                        var res=ajax.response;
                        success(res);

                }else{
                    if(ajax.readyState === 4 && ajax.status !== 200){
                        failed("ajax 请求失败");
                    }
                }
            }
        })
        return p;

    },
    fn:function () {
        console.log("fn");
    }

};
