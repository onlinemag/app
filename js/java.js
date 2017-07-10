
var visible = new Array();

for (i=0; i <= num; i++){
	visible[i] = true;
	function showFun(i) {
		
			if(visible[i]) {
				document.getElementById('Show'+i ).style.display = 'block';
				document.getElementById('icon_down'+i ).style.display = 'block';
				document.getElementById('icon_right'+i ).style.display = 'none';
				visible[i] = false;
			} else {
				document.getElementById('Show'+i ).style.display = 'none';
				document.getElementById('icon_down'+i ).style.display = 'none';
				document.getElementById('icon_right'+i ).style.display = 'block';
				visible[i] = true;
			}
		
	}
	var visible_com = new Array();
	visible_com[i] = true;
	function showCom(i) {
		
			if(visible_com[i]) {
				document.getElementById('Com'+i ).style.display = 'none';
				visible_com[i] = false;
			} else {
				document.getElementById('Com'+i ).style.display = 'block';
				visible_com[i] = true;
			}
		
	}
	var visible_com_com = new Array([],[]);
	for (ii=0; ii <= num_i; ii++){
	visible_com_com[ii][i] = true;

	function showCom_Com(ii, i) {
		
			if(visible_com_com[ii][i]) {
				document.getElementById('Com_Com'+ii+i ).style.display = 'none';
				visible_com_com[ii][i] = false;
			} else {
				document.getElementById('Com_Com'+ii+i ).style.display = 'block';
				visible_com_com[ii][i] = true;
			}
		}
		
	}
}