/**
 * Created by Administrator on 2016/6/21.
 */

/*复选框的限制*/
function $A(name){return document.getElementsByClassName(name);}
window.onload=function(){
    function checks(name,maxck){
        var cks = $A(name);
        function check(){
            var t=0;
            for(i=0;i<cks.length;i++){
                if(cks[i].checked){t++;}
                if(t>maxck){return false;}
            }
            return true;
        }
        for(i=0;i<cks.length;i++){
            cks[i].onclick=function(){
                if(!check()){
                    alert("最多选择"+maxck+"个");
                    this.checked=false;
                }
            }
        }

    }
    checks("things",3);
}

/*表单是否为空*/
function Checkform(){
    for(var i = 0; i <= 11; i++){
        var nun =document.getElementsByTagName("input");
        if(nun[i].value == null || nun[i].value.length == 0){
            alert("还有未填的空！");
            break;
        }
    }
}


function getRecodeInTable(){
    var input=[];
    var tb=document.getElementById("tb");
    var trlen=tb.rows.length;
    for(var i=0;i<trlen;i++){
       for(var j=0;j<tb.rows[i].cells.length;j++){
           input[j]=tb.rows[i].cells[j].getElementsByTagName("input")[0].value;
       }
    }
    return input;
}

