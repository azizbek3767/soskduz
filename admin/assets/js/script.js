function confirmLanguageChange(sbmButton){
	if(window.confirm(lang['sureToChangeLang'] + ' "'+sbmButton.form.defaultLang.options[sbmButton.form.defaultLang.selectedIndex].label+'"?') == false) return false;
	sbmButton.form.submit();
}
function showChangeLangForm(){
	document.getElementById('changeLangRow').style.display = 'inline';
	if(typeof keepLabel == 'undefined') document.getElementById('changeLangLabel').innerHTML = '<b>' + lang['changeDefaultLang'] + '</b>';
}
function webLanguageOptionChange(thisSelect){
	if(typeof lang2charset != 'undefined'){
		if(lang2charset[thisSelect.value]){
			var charsetOptions = document.getElementById('charsetOptions').options;
			for(i = 0; i < charsetOptions.length; i++){
				if(charsetOptions[i].value == lang2charset[thisSelect.value]){
					charsetOptions[i].selected = true;
					break;
				}
			}
		}
	}
}
function languageOptionChange(thisSelect){
	document.getElementById('codename').value     = thisSelect.value;
	document.getElementById('languageName').value = thisSelect.options[thisSelect.selectedIndex].text
	if(typeof lang2charset != 'undefined'){
		if(lang2charset[thisSelect.value]){
			var charsetOptions = document.getElementById('charsetOptions').options;
			for(i = 0; i < charsetOptions.length; i++){
				if(charsetOptions[i].value == lang2charset[thisSelect.value]){
					charsetOptions[i].selected = true;
					break;
				}
			}

			var adminLanguageOptions = document.getElementById('adminLanguageOptions').options;
			for(i = 0; i < adminLanguageOptions.length; i++){
				if(adminLanguageOptions[i].value == thisSelect.value){
					adminLanguageOptions[i].selected = true;
					break;
				}
			}
		}
	}
}
function hideCommentPopup(commentId, theEvent){
	popup    = document.getElementById('popup' + commentId);
	popupRow = document.getElementById('comment-' + commentId);

	var left   = page_location(popup, 'Left');
	var top    = page_location(popup, 'Top');
	var right  = left + popup.offsetWidth;
	var bottom = top + popup.offsetHeight;

	var rowLeft   = page_location(popupRow, 'Left');
	var rowTop    = page_location(popupRow, 'Top');
	var rowRight  = rowLeft + popupRow.offsetWidth;
	var rowBottom = rowTop + popupRow.offsetHeight;

	eX = theEvent.clientX + document.body.scrollLeft;
	eY = theEvent.clientY + document.body.scrollTop;

	if(document.body.clientLeft) eX -= document.body.clientLeft;
	if(document.body.clientTop) eY -= document.body.clientTop;
	if ((eX <= left || eX >= right || eY <= top || eY >= bottom) && (eX <= rowLeft || eX >= rowRight || eY <= rowTop || eY >= rowBottom)){
		popup.style.display = 'none';
		popup = undefined;
	}
}
function showCommentPopup(commentId){
	if(typeof popup != 'undefined'){
		if(popup.id == 'popup' + commentId) return false;
		popup.style.display = 'none';
	}

	destElement = document.getElementById('popupPosition' + commentId);
	destLeft  = page_location(destElement, 'Left');
	destTop   = page_location(destElement, 'Top');
	destWidth = destElement.offsetWidth;

	popup = document.getElementById('popup' + commentId);
	popup.style.left  = destLeft;
	popup.style.top   = destTop;
	popup.style.width = (destWidth + 1) + 'px';

	popup.style.visibility = 'hidden';
	popup.style.display = 'inline';

	if((popup.offsetHeight + popup.offsetTop) > (document.body.scrollTop + document.body.clientHeight)){
		popup.style.top = popup.offsetTop - ((popup.offsetHeight + popup.offsetTop) - (document.body.scrollTop + document.body.clientHeight));
	}

	if(popup.offsetTop < document.body.scrollTop){
		popup.style.top = document.body.scrollTop;
	}

	popup.style.visibility = 'visible';
}
function markAllComments(statusValue){
	inputs = document.getElementsByTagName('INPUT');
	for (var i = 0; i < inputs.length; i++) {
		input = inputs[i];
		if(input.type == 'radio' && input.value == statusValue) input.checked = true;
	}
}
function deleteStats(){

	if(!ajaxIsFree()) return false;
	var settingsForm = document.getElementById('settings');
	var date = settingsForm['date[Year]'].value + '-' + settingsForm['date[Month]'].value + '-' + settingsForm['date[Day]'].value;
	if(window.confirm(lang['sureToDeleteStats'] + ' '+date+'?') == false) return false;
//	writeStatus(lang['clearingStats'] + '...', '', 'statsAjaxStatus');
	postData("settings.php?action[delete_stats]=true&date=" + date);
	deleteStatsMessage();
	return false;
}
function hideNav(navId, theEvent){
	navBox  = document.getElementById(navId + 'TopNav');
	navHead = document.getElementById(navId + 'TopNavHead');

	var left   = page_location(navBox, 'Left');
	var top    = page_location(navBox, 'Top');
	var right  = left + navBox.offsetWidth;
	var bottom = top + navBox.offsetHeight;

	var headRight  = page_location(navHead, 'Left') + navHead.offsetWidth;
	var headBottom = page_location(navHead, 'Top') + navHead.offsetHeight;

	eX = theEvent.clientX + document.body.scrollLeft;
	eY = theEvent.clientY + document.body.scrollTop;

	if(document.body.clientLeft) eX -= document.body.clientLeft;
	if(document.body.clientTop) eY -= document.body.clientTop;
	if ((eX <= left || eX >= right || eY <= top || eY >= bottom) || (eY <= headBottom && eX >= headRight)){
		show_select_boxes();
		navBox.style.display = 'none';
		navBox = undefined;
	}
}
function showNav(navId, destElement){
	show_select_boxes();

	if(typeof navBox != 'undefined'){
		if(navBox.id == navId + 'TopNav') return false;
		navBox.style.display = 'none';
	}

	navBox = document.getElementById(navId + 'TopNav');
	navBox.style.left = page_location(destElement, 'Left') - 8;
	navBox.style.top  = page_location(destElement, 'Top') - 5;

	navBox.style.visibility = 'hidden';
	navBox.style.display = 'inline';
	hide_select_boxes(navId);
	navBox.style.visibility = 'visible';
}
function goodBrowser(){
	if(navigator.appVersion.indexOf('MSIE') != -1){
		var temp = navigator.appVersion.split('MSIE');
		var version = parseFloat(temp[1]);
		if(version < 7) return false;
	}
	return true;
}
function hide_select_boxes(navId) {
	if(goodBrowser()) return true;

	navBox = document.getElementById(navId + 'TopNav');
	oX = page_location(navBox, 'Left');
	oY = page_location(navBox, 'Top');
	oW = navBox.offsetWidth;
	oH = navBox.offsetHeight;

	tag_types = new Array("IFRAME", "SELECT");
	for (var j=0; j<tag_types.length; j++) {
		selEl = document.all.tags(tag_types[j]);
		for (var i=0; i<selEl.length; i++) {
			select_box = selEl[i];
			sX = page_location(select_box, 'Left');
			sY = page_location(select_box, 'Top');
			sW = select_box.offsetWidth;
			sH = select_box.offsetHeight;
			if(((oX > sX || (oX + oW) > sX) && oX < (sX + sW)) && ((oY > sY || (oY + oH) > sY) && oY < (sY + sH))){
				select_box.isHidden = 1;
				select_box.style.visibility = 'hidden';
			}
		}
	}
}
function show_select_boxes() {
	if(goodBrowser()) return true;

	tag_types = new Array("IFRAME", "SELECT");
	for (var j=0; j<tag_types.length; j++) {
		if(document.all){
			selEl = document.all.tags(tag_types[j]);
		} else {
			selEl = document.getElementsByTagName(tag_types[j]);
		}
		for (var i=0; i<selEl.length; i++) {
			select_box = selEl[i];
			if(typeof select_box.isHidden !=  'undefined' && select_box.isHidden) {
				select_box.isHidden = 0;
				select_box.style.visibility = 'visible';
			}
		}
	}
}
function page_location(o, t){
	x = 0;
	while(o.offsetParent){
		x += o['offset'+t];
		o = o.offsetParent;
	}
	x += o['offset'+t];
	return x
}
function writeThis(text) {
	document.write(text);
	/*
	objects = document.getElementsByTagName("object");
	for (var i = 0; i < objects.length; i++){
		objects[i].outerHTML = objects[i].outerHTML;
	}
	*/
}
function highlightRow(rowId, idPrefix, tableId, hlClassName){
	if(rowId > 0){
		srcRow = document.getElementById(idPrefix+rowId);
		if(typeof srcRow != 'undefined' && !srcRow.isHighlighted){
			oddEvenTable(tableId, idPrefix);
			if(srcRow.oldClassName){
				className = srcRow.oldClassName;
			} else {
				className = srcRow.className
			}
			window.setTimeout("reloadOldClassName('" + rowId + "', '" + idPrefix + "', '" + className + "')", 15000);
			srcRow.className = className + ' '+hlClassName;
			srcRow.isHighlighted = true;
		}
	}
}
function reloadOldClassName(rowId, idPrefix, className){
	srcRow = document.getElementById(idPrefix+rowId);
	if(typeof srcRow != 'undefined'){
		if(srcRow.oldClassName) srcRow.oldClassName = className;
		srcRow.className = className;
		srcRow.isHighlighted = false;
	}
}
function wordStatistics(srcId, charDestId, wordDestId){
	document.getElementById(charDestId).innerHTML = document.getElementById(srcId).value.length;
	if(result = document.getElementById(srcId).value.match(/\w+/g)) document.getElementById(wordDestId).innerHTML = result.length;
}
function showActionRow(row){
	if(document.getElementById(row+'Label').className == 'strong') return false;
	for(i = 0; i < rows.length; i++){
		if(rows[i] == row){
			document.getElementById(rows[i]+'Row').style.display = '';
			document.getElementById(rows[i]+'Label').className = 'strong';
		} else {
			document.getElementById(rows[i]+'Row').style.display = 'none';
			document.getElementById(rows[i]+'Label').className = 'action';
		}
	}
}
function clearCache(){
	if(!ajaxIsFree()) return false;
	//writeStatus(lang['clearingCache'] + '...');
	postData("settings.php?action[clear_cache]=true");
	clearCacheMessage();
	return false;
}
function checkAllBoxes(checked, idIndex){
	checkBoxes = document.getElementById('sectionRights').getElementsByTagName('INPUT');
	for(i = 0; i < checkBoxes.length; i++){
		checkBox = checkBoxes[i];
		if(typeof checkBox.id != 'undefined' && checkBox.id.indexOf(idIndex) != -1){
			checkBox.checked = checked;
		}
	}
	document.getElementById('disallow').checked = true
}
function accessLevelChange(){
	var accessLevel = document.getElementById('accessLevel').value;
	var allow = document.getElementById('allow');
	var disallow = document.getElementById('disallow');
	var labelAllow = document.getElementById('labelAllow');
	var labelDisallow = document.getElementById('labelDisallow');
	var rightsNav = document.getElementById('rightsNav');
	var rightsPane = document.getElementById('rightsPane');
	var link2rights = document.getElementById('link2rights');
	if(accessLevel == 'administrator'){
		allow.checked = true;
		allow.disabled = true;
		disallow.disabled = true;
		rightsNav.className = 'paneNav paneDsbl';
		labelAllow.className = 'passive';
		labelDisallow.className = 'passive';
		link2rights.className = '';
	} else {
		allow.disabled = false;
		disallow.disabled = false;
		rightsNav.className = 'paneNav panePsv';
		labelAllow.className = '';
		labelDisallow.className = '';
		link2rights.className = 'action';
	}
}
function oddEvenTable(tableId, idIndex){
	nodes = document.getElementById(tableId).getElementsByTagName('TR');
	nodeClass = 'odd';
	for(i = 0; i < nodes.length; i++){
		node = nodes[i];
		if(typeof node.id != 'undefined' && node.id.indexOf(idIndex) != -1 && node.style.display != 'none'){
			node.className = nodeClass;
			node.oldClassName = nodeClass;
			nodeClass = (nodeClass == 'odd') ? 'even' : 'odd';
		}
	}
}
function openPane(pane){
	if(document.getElementById(pane+'Nav').className == 'paneNav paneDsbl') return false;
	for(i = 0; i < panes.length; i++){
		if(panes[i] == pane){
			document.getElementById(panes[i]+'Pane').style.display = '';
			document.getElementById(panes[i]+'Nav').className = 'paneNav paneAcv';
		} else {
			document.getElementById(panes[i]+'Pane').style.display = 'none';
			if(document.getElementById(panes[i]+'Nav').className != 'paneNav paneDsbl'){
				document.getElementById(panes[i]+'Nav').className = 'paneNav panePsv';
			}
		}
	}
}
function showSearchForm(keepLabel){
	document.getElementById('searchRow').style.display = 'inline';
	//if(typeof keepLabel == 'undefined') document.getElementById('searchLabel').innerHTML = '<b>' + lang['search'] + '</b>';
	document.getElementById('searchForm').query.focus();
}
function selectLine(lineNumber, areaId){
	textarea = document.getElementById(areaId);
	tVal = textarea.value;
	re = /((.*?)(\r\n|\r|\n|$))/g;
	lCount = 0;
	selStart = 0;
	if(textarea.setSelectionRange){
		/* FireFox */
		tVal.replace(re,
			function (str, p1, p2, p3, offset, s) {
				lCount++;
				if(lCount <= lineNumber){
					selStart = offset;
					selEnd = offset + p2.length;
				}
			}
		)
		textarea.focus();
		textarea.setSelectionRange(selStart, selEnd);
	} else if(textarea.createTextRange) {
		/* Internet Explorer */
		tVal.replace(re,
			function (str, p1, p2, p3, offset, s) {
				lCount++;
				if(lCount <= lineNumber){
					selStart = offset - lCount + 1;
					selEnd = offset - lCount + 1 + p2.length;
				}
			}
		)
		var range = textarea.createTextRange();
		range.collapse(true);
		range.moveEnd('character', selEnd);
		range.moveStart('character', selStart);
		range.select();
	}
}
function codeKeyDown(evt, areaId){
	if(evt.keyCode == 9 && evt.shiftKey == 0){
		/* TAB */
		if(typeof document.selection == 'undefined'){
			/* FireFox */
			textarea = document.getElementById(areaId);
			startPos = textarea.selectionStart;
			endPos = textarea.selectionEnd;
			if(startPos == endPos){
				textarea.value = textarea.value.substring(0, startPos) + '  ' + textarea.value.substring(endPos, textarea.value.length);
				setSelRange(textarea, startPos + 2, endPos + 2);
			}
		} else {
			/* IE */
			with (document.selection.createRange()){
				if(text.length == 0) text = '  ';
			}
			evt.returnValue = false;
		}
		return false;
	}
	return true;
}
function testTemplate(){
	if(!ajaxIsFree()) return false;
	httpResponseEvalOnError = "templateHasError()";
	writeStatus(lang['testingTemplate'] + '...');
	templateForm = document.getElementById('template');
	templateForm['action[save]'].value = 0;
	templateForm['action[checkTemplate]'].value = 1;
	//templateForm['template[content]'].readOnly = true;
	postData("templates.php", createRequestString(templateForm));
	document.getElementById('submitButton').disabled = true;
	return false;
}
function templateHasError(){
	document.getElementById('submitButton').disabled = false;
	httpResponseText = httpResponseText.replace(/<\S[^><]*>/g, '');
	httpResponseText = httpResponseText.replace(/Fatal\s+error\:\s+Smarty\s+error\:\s*\[in test\-template\.tmp line (\d+)\]:/gi, lang['smartyErrorOnLine'] + ' $1: ');
	httpResponseText = httpResponseText.replace(/\S+Smarty_Compiler.+/gi, '');
	templateForm['template[content]'].readOnly = false;
	re = /.+ line (\d+)/;
	if(matches = re.exec(httpResponseText)) selectLine(matches[1], 'content');
	writeStatus(httpResponseText, 'aError');
}

function approveArticle(articleId){
	if(!ajaxIsFree()) return false;
	writeStatus(lang['changingStatus'] + '...');
	postData("articles.php?action[approveArticle]=true&article[articleId]="+articleId);
	return false;
}
function approveContent(id, url){
	if(!ajaxIsFree()) return false;
	writeStatus(lang['changingStatus'] + '...');
	postData(url+".php?action[approveContent]=true&article[articleId]="+id);
	return false;
}
function approveSlider(sliderId){
	if(!ajaxIsFree()) return false;
	writeStatus(lang['changingStatus'] + '...');
	postData("sliders.php?action[approveSlider]=true&slider[sliderId]="+sliderId);
	return false;
}
function approveGallery(articleId){
	if(!ajaxIsFree()) return false;
	writeStatus(lang['changingStatus'] + '...');
	postData("gallerys.php?action[approveGallery]=true&article[articleId]="+articleId);
	return false;
}
function approveProduct(articleId){
	if(!ajaxIsFree()) return false;
	writeStatus(lang['changingStatus'] + '...');
	postData("products.php?action[approveProduct]=true&article[articleId]="+articleId);
	return false;
}
function approveNews(articleId){
	if(!ajaxIsFree()) return false;
	writeStatus(lang['changingStatus'] + '...');
	postData("news.php?action[approveNews]=true&article[articleId]="+articleId);
	return false;
}
function deleteTemplate(fileName){
	if(!ajaxIsFree()) return false;
	if(window.confirm(lang['sureToDelete'] + ' "'+fileName+'"?') == false) return false;
	writeStatus(lang['deletingTemplate'] + '...');
	postData("templates.php?action[delete]=true&template[fileName]="+fileName);
	return false;
}

function deleteFile(path, file){
	if(window.confirm(lang['sureToDelete'] + ' "'+file+'"?') == false) return false;
	document.location = 'file-manager.php?path='+path+'&action[delete]=true&file[name]='+file;
}
function deleteAFile(path, file){
	if(window.confirm(lang['sureToDelete'] + ' "'+file+'"?') == false) return false;
	document.location = 'files.php?path='+path+'&action[delete]=true&file[name]='+file;
}
function deleteArticle(articleId, articleTitle){
	if(!ajaxIsFree()) return false;
	if(window.confirm(lang['sureToDelete'] + ' "'+articleTitle+'"?') == false) return false;
	postData("articles.php?action[deleteArticle]=true&article[articleId]="+articleId);
	deleteArticleMessage();
	return false;
}
function deleteContent(id, title, url){
	if(!ajaxIsFree()) return false;
	if(window.confirm(lang['sureToDelete'] + ' "'+title+'"?') == false) return false;
	postData(url+".php?action[deleteContent]=true&article[articleId]="+id);
	deleteArticleMessage();
	return false;
}

function deleteGallery(articleId, articleTitle){
	if(!ajaxIsFree()) return false;
	if(window.confirm(lang['sureToDelete'] + ' "'+articleTitle+'"?') == false) return false;
	postData("gallerys.php?action[deleteGallery]=true&article[articleId]="+articleId);
	deleteGalleryMessage();
	return false;
}
function deleteProduct(articleId, articleTitle){
	if(!ajaxIsFree()) return false;
	if(window.confirm(lang['sureToDelete'] + ' "'+articleTitle+'"?') == false) return false;
	postData("products.php?action[deleteProduct]=true&article[articleId]="+articleId);
	deleteProductMessage();
	return false;
}
function deleteNews(articleId, articleTitle){
	if(!ajaxIsFree()) return false;
	if(window.confirm(lang['sureToDelete'] + ' "'+articleTitle+'"?') == false) return false;
	postData("news.php?action[deleteNews]=true&article[articleId]="+articleId);
	deleteNewsMessage();
	return false;
}
function deleteSlide(sliderId, sliderTitle){
	if(!ajaxIsFree()) return false;
	if(window.confirm(lang['sureToDelete'] + ' "'+sliderTitle+'"?') == false) return false;
	postData("sliders.php?action[deleteSlide]=true&slider[sliderId]="+sliderId);
	deleteSlidesMessage();
	return false;
}

function deleteDonation(id, name){
	if(!ajaxIsFree()) return false;
	if(window.confirm(lang['sureToDelete'] + ' "'+name+'"?') == false) return false;
	postData("donations.php?action[deleteDonation]=true&donation[id]="+id);
	deleteMessage();
	return false;
}

function deletePayment(paymentId, paymentName){
	if(!ajaxIsFree()) return false;
	if(window.confirm(lang['sureToDelete'] + ' "'+paymentName+'"?') == false) return false;
	postData("payments.php?action[deletePayment]=true&payment[paymentId]="+paymentId);
	deletePaymentMessage();
	return false;
}

function deleteUser(userId, userName){
    if(!ajaxIsFree()) return false;
    if(window.confirm(lang['sureToDelete'] + ' "'+userName+'"?') == false) return false;
    postData("users.php?action=delete&user[userId]="+userId);
    return false;
}

function deleteSubscribe(userId, email){
    if(!ajaxIsFree()) return false;
    if(window.confirm(lang['sureToDelete'] + ' "'+email+'"?') == false) return false;
    postData("subscribers.php?action[deleteSubscribe]=true&user[userId]="+userId);
    deleteUserMessage();
    return false;
}


function deleteAdminUserImage(userId){
	if(!ajaxIsFree()) return false;
	if(window.confirm(lang['surToDeleteImage'] + '') == false) return false;
	writeStatus(' (' + lang['deletingImage'] + '...)', '', 'deletingStatus');
	postData("users.php?action=deleteImage&user[userId]="+userId);
    deleteAdminUserImageMessage();
	return false;
}
function deleteArticleImage(articleId){
	if(!ajaxIsFree()) return false;
	if(window.confirm(lang['sureToDeleteImage'] + '?') == false) return false;
	writeStatus(' (' + lang['deletingImage'] + '...)', '', 'deletingStatus');
	postData("articles.php?action[deleteArticleImage]=true&article[articleId]="+articleId);
	deleteImageMessage();
	return false;
}
function deleteGalleryImage(articleId){
	if(!ajaxIsFree()) return false;
	if(window.confirm(lang['sureToDeleteImage'] + '?') == false) return false;
	writeStatus(' (' + lang['deletingImage'] + '...)', '', 'deletingStatus');
	postData("gallerys.php?action[deleteGalleryImage]=true&article[articleId]="+articleId);
	deleteImageMessage();
	return false;
}
function deleteProductImage(articleId){
	if(!ajaxIsFree()) return false;
	if(window.confirm(lang['sureToDeleteImage'] + '?') == false) return false;
	writeStatus(' (' + lang['deletingImage'] + '...)', '', 'deletingStatus');
	postData("products.php?action[deleteProductImage]=true&article[articleId]="+articleId);
	deleteImageMessage();
	return false;
}
function deleteNewsImage(articleId){
	if(!ajaxIsFree()) return false;
	if(window.confirm(lang['sureToDeleteImage'] + '?') == false) return false;
	writeStatus(' (' + lang['deletingImage'] + '...)', '', 'deletingStatus');
	postData("news.php?action[deleteNewsImage]=true&article[articleId]="+articleId);
	deleteImageMessage();
	return false;
}
function deleteSliderImage(sliderId){
	if(!ajaxIsFree()) return false;
	if(window.confirm(lang['sureToDeleteImage'] + '?') == false) return false;
	writeStatus(' (' + lang['deletingImage'] + '...)', '', 'deletingStatus');
	postData("sliders.php?action[deleteSliderImage]=true&slider[sliderId]="+sliderId);
	deleteImageMessage();
	return false;
}
function deleteSectionImage(sectionId){
	if(!ajaxIsFree()) return false;
	if(window.confirm(lang['sureToDeleteImage'] + '?') == false) return false;
	writeStatus(' (' + lang['deletingSecImage'] + '...)', '', 'deletingStatus');
	postData("sections.php?action[deleteSectionImage]=true&section[sectionId]="+sectionId);
	deleteImageMessage();
	return false;
}

function deleteFileContent(articleId, name, url){
    if(!ajaxIsFree()) return false;
    if(window.confirm('Вы действительно хотите удалить файл «' + name + '»?') == false) return false;
    postData(url+".php?action[deleteFileContent]=true&article[articleId]="+articleId);
    deleteFileMessage();
    return false;
}
function deleteFileSection(sectionId, name, url){
    if(!ajaxIsFree()) return false;
    if(window.confirm('Вы действительно хотите удалить файл «' + name + '»?') == false) return false;
    postData(url+".php?action[deleteFileSection]=true&section[sectionId]="+sectionId);
    deleteFileMessage();
    return false;
}

function deleteOrder(id, name){
	if(!ajaxIsFree()) return false;
	if(window.confirm(lang['sureToDelete'] + ' "'+name+'"?') == false) return false;
	postData("orders.php?action[deleteOrder]=true&order[id]="+id);
	deleteOrderMessage();
	return false;
}
function deletePayment(paymentId, name){
    if(!ajaxIsFree()) return false;
    if(window.confirm(lang['sureToDelete'] + ' "'+name+'"?') == false) return false;
    postData("payments.php?action[deletePayment]=true&payment[paymentId]="+paymentId);
    deletePaymentMessage();
    return false;
}


function removeElement(elementId, elementPrefix){
	node = document.getElementById(elementPrefix+'-'+elementId);
	node.parentNode.removeChild(node);
	oddEvenTable(elementPrefix+'s', elementPrefix);
}
function hlSrcVisit(srcVisitId){
	srcVisit = document.getElementById(srcVisitId);
	if(typeof srcVisit != 'undefined' && !srcVisit.isHighlighted){
		srcVisit.style.display = '';
		oddEvenTable('visits', 'visit');
		if(srcVisit.oldClassName){
			className = srcVisit.oldClassName;
		} else {
			className = srcVisit.className
		}
		window.setTimeout("returnClassName('" + srcVisitId + "', '" + className + "')", 3000);
		srcVisit.className = className + ' hlight';
		srcVisit.isHighlighted = true;
	}
	return false;
}
function returnClassName(srcVisitId, className){
	srcVisit = document.getElementById(srcVisitId);
	if(typeof srcVisit != 'undefined'){
		if(srcVisit.oldClassName) srcVisit.oldClassName = className;
		srcVisit.className = className;
		srcVisit.isHighlighted = false;
	}
}
function proposeFileName(srcName, destName, formName, separator, convertToLowerCase){
	form = document.getElementById(formName);
	if(form[destName].value == ''){
		re = new RegExp('(^\\'+separator+'|\\'+separator+'$)', 'gi');
		form[destName].value = form[srcName].value.replace(/[^0-9a-zA-Z\-_\.]+/gi, separator).replace(re, '');
		if(convertToLowerCase == '1') form[destName].value = form[destName].value.toLowerCase();
	}
}
function swapElements(elementId_1, elementId_2, elementPrefix){
	node = document.getElementById(elementId_1);
	previousSibling = node.previousSibling;

	/* FireFox Bug: previousSibling returns Text objects, instead of TR nodes */
	while(typeof previousSibling.tagName == 'undefined') previousSibling = previousSibling.previousSibling;

	if(previousSibling.id == elementId_2){
		parentNode = node.parentNode;
		if(node != parentNode.firstChild) parentNode.insertBefore(node, previousSibling);
		if(node.style.display == 'none'){
			previousSibling.style.display = 'none';
			node.style.display = '';
		} else if (previousSibling.style.display == 'none') {
			previousSibling.style.display = '';
			node.style.display = 'none';
		}
	}
	oddEvenTable(elementPrefix+'s', elementPrefix);
	window.setTimeout("writeStatus('')", 2000);
}
function moveUpLanguage(languageId, languageName){
	if(!ajaxIsFree()) return false;
	writeStatus(lang['movingUp'] + ' "' + languageName + '"...');
	postData("languages.php?action[moveUp]=true&language[languageId]="+languageId);
	return false;
}
function moveDownLanguage(languageId, languageName){
	if(!ajaxIsFree()) return false;
	writeStatus(lang['movingDown'] + ' "' + languageName + '"...');
	postData("languages.php?action[moveDown]=true&language[languageId]="+languageId);
	return false;
}

function moveUp(sectionId, sectionName){
	if(!ajaxIsFree()) return false;
	writeStatus(lang['movingUp'] + ' "' + sectionName + '"...');
	postData("sections.php?action[moveUp]=true&section[sectionId]="+sectionId);
	moveUpMessage();
	return false;
}
function moveDown(sectionId, sectionName){
	if(!ajaxIsFree()) return false;
	writeStatus(lang['movingDown'] + ' "' + sectionName + '"...');
	postData("sections.php?action[moveDown]=true&section[sectionId]="+sectionId);
	moveDownMessage();
	return false;
}
function deleteCustomer(userId, userTitle){
	if(!ajaxIsFree()) return false;
	if(window.confirm(lang['sureToDelete'] + ' "'+userTitle+'"?') == false) return false;
	//writeStatus(lang['deletingSiteUser'] + '...');
	postData("customers.php?action[deleteCustomer]=true&customer[userId]="+userId);
	deleteSiteUserMessage();
	return false;
}
function approveCustomer(userId){
	if(!ajaxIsFree()) return false;
	writeStatus(lang['changingStatus'] + '...');
	postData("customers.php?action[approveCustomer]=true&customer[userId]="+userId);
	return false;
}
function deleteCustomerImage(userId){
	if(!ajaxIsFree()) return false;
	if(window.confirm(lang['sureToDeleteImage'] + '?') == false) return false;
	postData("customers.php?action[deleteCustomerImage]=true&customer[userId]="+userId);
	deleteUserImageMessage();
	return false;
}
function topChecked(sectionId){
	if(!ajaxIsFree()) return false;
	writeStatus(lang['changingStatus'] + '...');
	postData("sections.php?action[topChecked]=true&section[sectionId]="+sectionId);
	return false;
}
function downChecked(sectionId){
	if(!ajaxIsFree()) return false;
	writeStatus(lang['changingStatus'] + '...');
	postData("sections.php?action[downChecked]=true&section[sectionId]="+sectionId);
	return false;
}

function writeStatus(message, messageClass, destElementId){
	newTime = new Date;
	if(message == '' && (newTime.getTime() - lastTime) < 2000) return false;

	if(typeof destElementId == 'undefined' || destElementId == '') destElementId = 'ajaxStatus';
	statusField = document.getElementById(destElementId);
	if(messageClass){
		statusField.innerHTML = '<span class="' + messageClass + '">' + message + '</span>';
	} else {
		statusField.innerHTML = message;
	}

	lastTime = newTime.getTime();
	return false;
}
function ajaxIsFree(){
	if(typeof waitingResponse != 'undefined' && waitingResponse == true){
		alert(lang['processingRequest']);
		return false;
	}
	return true;
}
function handleHttpResponse(){
	if(XMLHttp.readyState == 4){
		if (XMLHttp.status == 200) {
		    try {
				eval(XMLHttp.responseText);
		    } catch (e) {
			 	if(typeof httpResponseEvalOnError != 'undefined' && httpResponseEvalOnError != ''){
					httpResponseText = XMLHttp.responseText;
					eval(httpResponseEvalOnError);
				} else {
					alert(lang['operationError'] + ": " + XMLHttp.responseText);
					document.location = document.location.pathname;
				}
			 }
			waitingResponse = false;
		} else {
			alert(lang['operationError'] + ": " + XMLHttp.responseText);
			document.location = document.location.pathname;
		}
	}
}
function postData(destination, data){
	if (window.XMLHttpRequest) {
		XMLHttp = new XMLHttpRequest();
	} else if (window.ActiveXObject) {
		XMLHttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	method = 'POST';
	if(typeof data == 'undefined') method = 'GET';
	XMLHttp.open(method, destination, true);
	if(method == 'POST') XMLHttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded; charset=UTF-8");
	XMLHttp.onreadystatechange = handleHttpResponse;
	XMLHttp.send(data);
	waitingResponse = true;
}
function createRequestString(theForm){
	vars = new Array();
	for(i = 0; i < theForm.elements.length; i++){
		element = theForm.elements[i];
		if(element.tagName.toLowerCase() == "input"){
			switch (element.type){
				case "text":
				case "hidden":
					vars.push(encodeURIComponent(element.name) + "=" + encodeURIComponent(element.value));
				break;

				case "checkbox":
				case "radio":
					if(element.checked){
						vars.push(encodeURIComponent(element.name) + "=" + encodeURIComponent(element.value));
					} else {
						vars.push(encodeURIComponent(element.name) + "=");
					}
				break;
			}
		}
		if (element.tagName.toLowerCase() == "select"){
			vars.push(encodeURIComponent(element.name) + "=" + encodeURIComponent(element.options[element.selectedIndex].value));
		}
		if (element.tagName.toLowerCase() == "textarea"){
			vars.push(encodeURIComponent(element.name) + "=" + encodeURIComponent(element.value));
		}
	}
	if(vars.length > 0){
		return vars.join("&");
	} else {
		return false;
	}
}
function openWindow(url, width, height){
	posTop = window.screen.height/2 - height/2 - 30;
	posLeft = window.screen.width/2 - width/2;
	if(posTop < 0) posTop = 0;
	if(posLeft < 0) posLeft = 0;
	window.open(url, '_blank', 'toolbar=0,location=0,directories=0,status=1,menubar=0,scrollbars=yes,resizable=yes,width='+width+',height='+height+',top='+posTop+',left='+posLeft);
	return false;
};
function openImage(url, width, height){
	posTop = window.screen.height/2 - height/2 - 30;
	posLeft = window.screen.width/2 - width/2;
	if(posTop < 0) posTop = 0;
	if(posLeft < 0) posLeft = 0;
	window.open(url, '_blank', 'toolbar=0,location=0,directories=0,status=1,menubar=0,scrollbars=yes,resizable=yes,width='+(width+40)+',height='+(height+30)+',top='+posTop+',left='+posLeft);
	return false;
};
