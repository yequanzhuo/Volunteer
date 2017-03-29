<!DOCTYPE html>
<html>
<head lang="en">
    <link rel="stylesheet" href="page_style.css" type="text/css">
    <meta charset="UTF-8">
    <title>沈阳师范大学志愿者注册页面</title>
    <script src="page_js.js" type="text/javascript"></script>
    <link href="bootstrap.min.css" type="text/css" rel="stylesheet">
    <script src="jquery-3.1.0.min.js"></script>
    <script src="bootstrap.min.js"></script>
    <!--lalala-->
    <style type="text/css">
        #span_image_preview{width:190px;height:190px;border:1px solid #000;overflow:hidden;}
        #img_head {filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod=image);}
		.logosky{
			width:50px;
			height:40px;
			margin-left: 460px;
		}
    </style>
    <script type="text/javascript">
        function $(str){
            return document.getElementById(str);
        }

        //开启上传头像
        function show_upload(){
            $("div_upload").style.display="block";
            $("input_show_upload").value="收起上传头像";
            $("input_show_upload").onclick=hide_upload;
        }

        function hide_upload(){
            $("div_upload").style.display="none";
            $("input_show_upload").value="打开上传头像";
            $("input_show_upload").onclick=show_upload;
        }

        //载入图片
        function upload_image_preview(file){

            var maxHeight=190,maxWidth=190;//设定最大宽高

            var div=$("span_image_preview");//获取对象

            if(file.files&&file.files[0]){
                div.innerHTML='<img id="img_head">';

                var img=$("img_head");//获取img_head的对象
                img.onload = function(){
                    var rect = calcImgZoomParam(maxWidth, maxHeight, img.offsetWidth, img.offsetHeight);//赋值
                    img.width  =  rect.width;
                    img.height =  rect.height;
                    img.style.marginLeft = rect.left+'px';
                    img.style.marginTop = rect.top+'px';
                };
                var reader = new FileReader();//新建一个FileReader对象
                reader.onload = function(evt){img.src = evt.target.result;};//获取result
                reader.readAsDataURL(file.files[0]);//以url读取file[0]
            }else{//兼容IE
                var sFilter='filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod=scale,src="';
                file.select();
                var src=document.selection.createRange().text;
                div.innerHTML='<img id="img_head">';
                var img=$('img_head');
                img.filters.item('DXImageTransform.Microsoft.AlphaImageLoader').src=src;
                var rect = calcImgZoomParam(maxWidth, maxHeight, img.offsetWidth, img.offsetHeight);//赋值
                status =('rect:'+rect.top+','+rect.left+','+rect.width+','+rect.height);
                div.innerHTML = "<div id='img_head' style='width:"+rect.width+"px;height:"+rect.height+"px;margin-top:"+rect.top+"px;"+sFilter+src+"\"'></div>";
            }
        }

        //图像等比例缩小
        function calcImgZoomParam(maxWidth,maxHeight,width,height){
            var param={top:0,left:0,width:width,height:height};

            if(width>maxWidth||height>maxHeight){//如果宽度超出最大宽度或者长度超出最大长度，计算比例
                rateHeight=height/maxHeight;
                rateWidth=width/maxWidth;

                if(rateWidth>rateHeight){//若宽度之比大（可以理解为超级宽）
                    param.width=maxWidth;//我们在这里取最大宽度为宽度
                    param.height=Math.round(height/rateWidth);//高度变为等比例高(四舍五入)
                }else{
                    param.height=maxHeight;
                    param.width=Math.round(width/rateHeight);
                }
            }

            param.top=Math.round((maxHeight-param.height)/2);//更短的那一条边会贴上边框
            param.left=Math.round((maxWidth-param.width)/2);

            return param;
        }


    </script>
</head>
<body>
<div id="container">
    <div class="title">沈阳师范大学志愿者注册页面</div>
    <div class="part_1">
        <article>
            <span id="pa_1"><b>志愿者誓词：</b></span>
            <br/>
            <p>
                我愿意成为一名光荣的志愿者。我承诺：我一定尽己所能，不计报酬，帮助他人。
                践行志愿精神，传播先进文化，为建设团结互助，平等友爱的美好校园贡献自己的力量。
            </p>
        </article>
    </div>
    <form name="form1" method="post" onsubmit="" action="2.php" enctype="multipart/form-data">
    <div class="part_2">
        <h4><b>注册志愿者基本资料：</b></h4>
        <br/>
        <div class="pic" id="pic_id">
     <!--       <img id="imghead" src="" alt="上传证件照" align="AbsMiddle" border="0" height="210" width="150">
            <br/>
            <input type="file"name="myFile" onchange="preview(this)" />-->
<!--            <div id="imghead"></div>
            <input type="file" onchange="preview(this)" />-->
          
                <input id="input_show_upload" type="button" onclick="show_upload();" value="我要上传头像">
                <div id="div_upload" style="display: none">
                    请选取头像文件:<input id="input_image_file" type="file" name="myFile" onchange="upload_image_preview(this);"><br>
                    头像预览:<div id="span_image_preview">
                    <img id="img_head">
                </div>
                </div>
         
        </div>

                    <div class="form_1">
                        姓名：<input type="text" name="username">
                        <!--<input type="submit" value="submit">-->
                    </div>
                    <br/>
                    <div class="form_1">
                        性别：
                        <select name="sex">
                            <option value="男">男</option>
                            <option value="女">女</option>
                        </select>
                    </div>
                    <br/>
                    <div class="form_1">
                        民族：
                        <select name="nation">
                            <option value="">请选择</option>
                            <option value="汉族">汉族</option>
                            <option value="土家族">土家族</option>
                            <option value="蒙古族">蒙古族</option>
                            <option value="回族">回族</option>
                            <option value="苗族">苗族</option>
                            <option value="傣族">傣族</option>
                            <option value="僳僳族">僳僳族</option>
                            <option value="藏族">藏族</option>
                            <option value="壮族">壮族</option>
                            <option value="朝鲜族">朝鲜族</option>
                            <option value="高山族">高山族</option>
                            <option value="纳西族">纳西族</option>
                            <option value="布朗族">布朗族</option>
                            <option value="阿昌族">阿昌族</option>
                            <option value="怒族">怒族</option>
                            <option value="鄂温克族">鄂温克族</option>
                            <option value="鄂伦春族">鄂伦春族</option>
                            <option value="赫哲族">赫哲族</option>
                            <option value="门巴族">门巴族</option>
                            <option value="白族">白族</option>
                            <option value="保安族">保安族</option>
                            <option value="布依族">布依族</option>
                            <option value="达斡尔族">达斡尔族</option>
                            <option value="德昂族">德昂族</option>
                            <option value="东乡族">东乡族</option>
                            <option value="侗族">侗族</option>
                            <option value="独龙族">独龙族</option>
                            <option value="俄罗斯族">俄罗斯族</option>
                            <option value="哈尼族">哈尼族</option>
                            <option value="哈萨克族">哈萨克族</option>
                            <option value="基诺族">基诺族</option>
                            <option value="京族">京族</option>
                            <option value="景颇族">景颇族</option>
                            <option value="柯尔克孜族">柯尔克孜族</option>
                            <option value="拉祜族">拉祜族</option>
                            <option value="黎族">黎族</option>
                            <option value="畲族">畲族</option>
                            <option value="珞巴族">珞巴族</option>
                            <option value="满族">满族</option>
                            <option value="毛南族">毛南族</option>
                            <option value="仫佬族">仫佬族</option>
                            <option value="普米族">普米族</option>
                            <option value="羌族">羌族</option>
                            <option value="撒拉族">撒拉族</option>
                            <option value="水族">水族</option>
                            <option value="塔吉克族">塔吉克族</option>
                            <option value="塔塔尔族">塔塔尔族</option>
                            <option value="仡佬族">仡佬族</option>
                            <option value="土族">土族</option>
                            <option value="佤族">佤族</option>
                            <option value="维吾尔族">维吾尔族</option>
                            <option value="乌孜别克族">乌孜别克族</option>
                            <option value="锡伯族">锡伯族</option>
                            <option value="瑶族">瑶族</option>
                            <option value="裕固族">裕固族</option>
                            <option value="彝族">彝族</option>

                        </select>
                    </div>
                    <br/>
                    <div class="form_1">
                        身高：<input type="text" name="height"><span>cm</span>
                        <!--<input type="submit" value="submit">-->
                    </div>
                    <br/>
                    <div class="form_1">
                        体重：<input type="text" name="weight"><span>kg</span>
                        <!--<input type="submit" value="submit">-->
                    </div>
                    <br/>
                    <div class="form_1">
                        出生日期：
                        <select name="birth[year]">
                            <option value="1980">1980</option>
                            <option value="1981">1981</option>
                            <option value="1982">1982</option>
                            <option value="1983">1983</option>
                            <option value="1984">1984</option>
                            <option value="1985">1985</option>
                            <option value="1986">1986</option>
                            <option value="1987">1987</option>
                            <option value="1988">1988</option>
                            <option value="1989">1989</option>
                            <option value="1990">1990</option>
                            <option value="1991">1991</option>
                            <option value="1992">1992</option>
                            <option value="1993">1993</option>
                            <option value="1994">1994</option>
                            <option value="1995">1995</option>
                            <option value="1996">1996</option>
                            <option value="1997">1997</option>
                            <option value="1998">1998</option>
                            <option value="1999">1999</option>
                            <option value="2000">2000</option>
                            <option value="2001">2001</option>
                            <option value="2002">2002</option>
                            <option value="2003">2003</option>
                            <option value="2004">2004</option>
                            <option value="2005">2005</option>
                            <option value="2006">2006</option>
                            <option value="2007">2007</option>
                            <option value="2008">2008</option>
                            <option value="2009">2009</option>
                            <option value="2010">2010</option>
                            <option value="2011">2011</option>
                            <option value="2012">2012</option>
                            <option value="2013">2013</option>
                            <option value="2014">2014</option>
                            <option value="2015">2015</option>
                            <option value="2016">2016</option>
                            <option value="2017">2017</option>
                            <option value="2018">2018</option>
                            <option value="2019">2019</option>
                            <option value="2020">2020</option>
                        </select>年
                        <select name="birth[month]">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                        </select>月
                        <select name="birth[dates]">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                            <option value="13">13</option>
                            <option value="14">14</option>
                            <option value="15">15</option>
                            <option value="16">16</option>
                            <option value="17">17</option>
                            <option value="18">18</option>
                            <option value="19">19</option>
                            <option value="20">20</option>
                            <option value="21">21</option>
                            <option value="22">22</option>
                            <option value="23">23</option>
                            <option value="24">24</option>
                            <option value="25">25</option>
                            <option value="26">26</option>
                            <option value="27">27</option>
                            <option value="28">28</option>
                            <option value="29">29</option>
                            <option value="30">30</option>
                            <option value="31">31</option>
                        </select>日
                    </div>
                    <br>
                    <div class="form_1">
                        政治面貌：
                        <select name="face">
                            <option value="中共党员">中共党员</option>
                            <option value="预备党员">预备党员</option>
                            <option value="共青团员">共青团员</option>
                            <option value="群众">群众</option>
                        </select>
                    </div>
                    <br/>
                    <div class="form_1">
                        家庭所在城市：<input type="text" name="address">
                    </div>
                    <br/>
                    <div class="form_1">
                        个人爱好：<input type="text" name="love">
                    </div>
                    <br/>
                    <div class="form_1">
                        是否有志愿者手册：
                        <select name="have">
                            <option value="是">是</option>
                            <option value="否">否</option>
                        </select>
                    </div>
<!--                </form>-->
    </div>
    <div class="part_3">
        <h4><b>学院信息：</b></h4>
        <br/>
            <div class="form_2">
                年级：
                <select name="grade">
                    <option value="">请选择</option>
                    <option value="12级">2012</option>
                    <option value="13级">2013</option>
                    <option value="14级">2014</option>
                    <option value="15级">2015</option>
                    <option value="16级">2016</option>
                </select>级
            </div>
            <br/>
            <div class="form_2">
                学号：<input type="text" name="username1" maxlength="8">
            </div>
            <br/>
            <div class="form_2">
                学院：
                <select name="academy">
                    <option value="">请选择</option>
                    <option value="教育科学学院">教育科学学院</option>
                    <option value="教育技术学院">教育技术学院</option>
                    <option value="学前与初等教育学院">学前与初等教育学院</option>
                    <option value="马克思主义学院学院">马克思主义学院学院</option>
                    <option value="生命科学学院学院">生命科学学院学院 </option>
                    <option value="化学化工学院学院">化学化工学院学院</option>
                    <option value="法学院">法学院</option>
                    <option value="管理学院">管理学院</option>
                    <option value="国际商学院">国际商学院</option>
                    <option value="古生物学院">古生物学院</option>
                    <option value="粮食学院">粮食学院</option>
                    <option value="旅游管理学院">旅游管理学院</option>
                    <option value="美术与设计学院学院">美术与设计学院学院</option>
                    <option value="软件学院">软件学院</option>
                    <option value="社会学学院">社会学学院</option>
                    <option value="数学与系统科学学院">数学与系统科学学院</option>
                    <option value="体育科学学院">体育科学学院</option>
                    <option value="外国语学院">外国语学院</option>
                    <option value="文学院">文学院</option>
                    <option value="物理科学与技术学院">物理科学与技术学院</option>
                    <option value="戏剧艺术学院">戏剧艺术学院</option>
                    <option value="音乐学院">音乐学院</option>
                </select>
            </div>
            <br/>
            <div class="form_2">
                专业：<input type="text" name="profession">
            </div>
    </div>
    <div class="part_4">
        <h4><b>个人信息验证：</b></h4>
        <br/>
            <div class="form_3">
                手机号码：<input type="text" name="phone">
            </div>
            <br/>
            <div class="form_3">
                QQ 号码：<input type="text" name="qq">
            </div>
            <br/>
            <div class="form_3">
                E-mail:<input type="text" name="email" id="E-mail">
            </div>
            <br/>
            <div class="form_3">
                微信号：<input type="text" name="weixin"> <!--<input type="submit" value="submit">-->
            </div>
    </div>
    <div class="part_5">
        <h4><b>支援服务分类：</b></h4>
        <br/>
        <div class="form_4">
            <table border="0" style="width: 600px; height: 130px">
                <tr>
                    <td><input type="checkbox" name="service[]" value="支教" class="things">支教</td>
                    <td><input type="checkbox" name="service[]" value="文化活动"  class="things">文化活动</td>
                    <td><input type="checkbox" name="service[]" value="礼仪接待" class="things">礼仪接待</td>
                    <td><input type="checkbox" name="service[]" value="法律援助" class="things">法律援助</td>
                </tr>
                <tr>
                    <td><input type="checkbox" name="service[]" value="无偿献血" class="things">无偿献血</td>
                    <td><input type="checkbox" name="service[]" value="孤儿院活动" class="things">孤儿院活动</td>
                    <td><input type="checkbox" name="service[]" value="社区服务" class="things">社区服务</td>
                    <td><input type="checkbox" name="service[]" value="西部专项" class="things">西部专项</td>

                </tr>
                <tr>
                    <td><input type="checkbox" name="service[]" value="环保" class="things">环保</td>
                    <td><input type="checkbox" name="service[]" value="交通指引" class="things">交通指引</td>
                    <td><input type="checkbox" name="service[]" value="医疗救急" class="things">医疗救急</td>
                    <td><input type="checkbox" name="service[]" value="外事活动" class="things">外事活动</td>
                </tr>
                </table>
        </div>
        <br/>
        <h4>注：此项最多只能选三项</h4>
    </div>
    <div class="part_6">
        <h4><b>志愿者诚信档案:</b></h4>
        <br/>
        <div class="form_5">
            <table id="tb">
                <tr>
                        <th width="40px">序号</th>
                        <th width="90px">志愿活动名称</th>
                        <th width="60px">服务时间</th>
                        <th width="190px">服务地点</th>
                        <th width="40px">服务时长</th>
                        <th width="110px">被服务单位负责人及联系电话</th>
                        <th width="110px">指导教师及联系电话</th> 
						<th width="110px">评论内容</th>
                        <th width="60px">审核状态</th>
                </tr>
                <tr>
                        <td><input type="text" name="first[]" class="t1" ></td>
                        <td><input type="text" name="first[]" class="t2"></td>
                        <td><input type="text" name="first[]" class="t3"></td>
                        <td><input type="text" name="first[]" class="t4"></td>
                        <td><input type="text" name="first[]" class="t5"></td>
                        <td><input type="text" name="first[]" class="t6"></td>
                        <td><input type="text" name="first[]" class="t7"></td>
                        <td><input type="text" name="first[]" class="t8"></td>
                         <td><select name="first[]">
							<option value="未审核">未审核</option>
						</select>
						</td>
                </tr>
                <tr>
                        <td><input type="text" name="second[]" class="t1"></td>
                        <td><input type="text" name="second[]" class="t2"></td>
                        <td><input type="text" name="second[]" class="t3"></td>
                        <td><input type="text" name="second[]" class="t4"></td>
                        <td><input type="text" name="second[]" class="t5"></td>
                        <td><input type="text" name="second[]" class="t6"></td>
                        <td><input type="text" name="second[]" class="t7"></td>
                        <td><input type="text" name="second[]" class="t8"></td>
                        <td><select name="second[]">
							<option value="未审核">未审核</option>
						</select>
						</td>
                </tr>
                <tr>
                        <td><input type="text" name="third[]" class="t1"></td>
                        <td><input type="text" name="third[]" class="t2"></td>
                        <td><input type="text" name="third[]" class="t3"></td>
                        <td><input type="text" name="third[]" class="t4"></td>
                        <td><input type="text" name="third[]" class="t5"></td>
                        <td><input type="text" name="third[]" class="t6"></td>
                        <td><input type="text" name="third[]" class="t7"></td>
                        <td><input type="text" name="third[]" class="t8"></td>
                         <td><select name="third[]">
							<option value="未审核">未审核</option>
						</select>
						</td>
                </tr>
                <tr>
                        <td><input type="text" name="forth[]" class="t1"></td>
                        <td><input type="text" name="forth[]" class="t2"></td>
                        <td><input type="text" name="forth[]" class="t3"></td>
                        <td><input type="text" name="forth[]" class="t4"></td>
                        <td><input type="text" name="forth[]" class="t5"></td>
                        <td><input type="text" name="forth[]" class="t6"></td>
                        <td><input type="text" name="forth[]" class="t7"></td>
                        <td><input type="text" name="forth[]" class="t8"></td>
						<td><select name="forth[]">
							<option value="未审核">未审核</option>
						</select>
						</td>
                </tr>
                <tr>
                        <td><input type="text" name="firth[]" class="t1"></td>
                        <td><input type="text" name="firth[]" class="t2"></td>
                        <td><input type="text" name="firth[]" class="t3"></td>
                        <td><input type="text" name="firth[]" class="t4"></td>
                        <td><input type="text" name="firth[]" class="t5"></td>
                        <td><input type="text" name="firth[]" class="t6"></td>
                        <td><input type="text" name="firth[]" class="t7"></td>
                        <td><input type="text" name="firth[]" class="t8"></td>
                        <td><select name="firth[]">
							<option value="未审核">未审核</option>
						</select>
						</td>
                </tr>
            </table>
            <br/>
            <h4>注：服务评价分为优秀，良好，中等，及格，不及格</h4>
            <br/>
            <button onclick="Checkform()" type="submit" class="btn btn-info">提交</button>
        </div>
    </div>
    </form>
	<span class="logosky">版权归<strong>Sky</strong>工作室所有</span>
</div>
</body>