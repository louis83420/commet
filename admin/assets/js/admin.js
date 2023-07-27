function addClass(ele,className){
	var classes = ele.className.split(/\s+/g);
	if(classes.indexOf(className) == -1){
		classes.push(className);
		ele.className = classes.join(' ');
	}
}
function removeClass(ele,className){
	var classes = ele.className.split(/\s+/g);
	if(classes.indexOf(className) != -1){
		classes.splice(classes.indexOf(className),1);
		ele.className = classes.join(' ');
	}
}
function showMask(){
		var divEle = document.createElement('div');
		divEle.id = 'dialog';
		divEle.style.position='absolute';
		divEle.style.left = 0;
		divEle.style.top = 0;
		divEle.style.right = 0;
		divEle.style.bottom = 0;
		divEle.style.zIndex = 8888;
		divEle.style.background='#000';
		divEle.style.opacity = .3;
		var maskEle = document.createElement('div');
		maskEle.style.position = 'absolute';
		maskEle.style.left = "calc(50% - 150px)";
		maskEle.style.top = 'calc(50% - 200px)';
		maskEle.style.width = '440px';
		maskEle.style.height = '250px';
		maskEle.style.background = '#fff';
		maskEle.style.borderRadius = '5px';
		maskEle.style.zIndex = 9000;
		var html = '';
		html += '<h2>确认删除对话框</h2>';
		html += '<p>确认要删除分类吗？</p><p>删除后将无法恢复</p>';
		html += '<p>';
		html += '<input type="button" value="确认" onclick="fun1()">';
		html += '<input type="button" value="取消">';
		html += '</p>'
		maskEle.innerHTML = html;
		document.body.appendChild(maskEle);
		document.body.appendChild(divEle);
}
function fun1(){
	console.log('Hello');
}