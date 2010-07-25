// JS QuickTags version 1.3.1
//
// Copyright (c) 2002-2008 Alex King
// http://alexking.org/projects/js-quicktags
//
// Thanks to Greg Heo <greg@node79.com> for his changes 
// to support multiple toolbars per page.
//
// Licensed under the LGPL license
// http://www.gnu.org/copyleft/lesser.html
//
// **********************************************************************
// This program is distributed in the hope that it will be useful, but
// WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. 
// **********************************************************************
//
// This JavaScript will insert the tags below at the cursor position in IE and 
// Gecko-based browsers (Mozilla, Camino, Firefox, Netscape). For browsers that 
// do not support inserting at the cursor position (older versions of Safari, 
// OmniWeb) it appends the tags to the end of the content.
//
// Pass the ID of the <textarea> element to the edToolbar and function.
//
// Example:
//
//  <script type="text/javascript">edToolbar('canvas');</script>
//  <textarea id="canvas" rows="20" cols="50"></textarea>
//

var dictionaryUrl = 'http://www.ninjawords.com/';

// other options include:
//
// var dictionaryUrl = 'http://www.answers.com/';
// var dictionaryUrl = 'http://www.dictionary.com/';

var dw_edButtons = new Array();
var dw_edLinks = new Array();
var dw_edOpenTags = new Array();

function dw_edButton(id, display, tagStart, tagEnd, access, open) {
	this.id = id;				// used to name the toolbar button
	this.display = display;		// label on button
	this.tagStart = tagStart; 	// open tag
	this.tagEnd = tagEnd;		// close tag
	this.access = access;			// set to -1 if tag does not need to be closed
	this.open = open;			// set to -1 if tag does not need to be closed
}

dw_edButtons.push(
	new dw_edButton(
		'ed_bold'
		,'B'
		,'<strong>'
		,'</strong>'
		,'b'
	)
);

dw_edButtons.push(
	new dw_edButton(
		'ed_italic'
		,'I'
		,'<em>'
		,'</em>'
		,'i'
	)
);

dw_edButtons.push(
	new dw_edButton(
		'ed_link'
		,'Link'
		,''
		,'</a>'
		,'a'
	)
); // special case

dw_edButtons.push(
	new dw_edButton(
		'ed_ext_link'
		,'Ext. Link'
		,''
		,'</a>'
		,'e'
	)
); // special case

dw_edButtons.push(
	new dw_edButton(
		'ed_img'
		,'IMG'
		,''
		,''
		,'m'
		,-1
	)
); // special case

dw_edButtons.push(
	new dw_edButton(
		'ed_ul'
		,'UL'
		,'<ul>\n'
		,'</ul>\n\n'
		,'u'
	)
);

dw_edButtons.push(
	new dw_edButton(
		'ed_ol'
		,'OL'
		,'<ol>\n'
		,'</ol>\n\n'
		,'o'
	)
);

dw_edButtons.push(
	new dw_edButton(
		'ed_li'
		,'LI'
		,'\t<li>'
		,'</li>\n'
		,'l'
	)
);

dw_edButtons.push(
	new dw_edButton(
		'ed_block'
		,'B-QUOTE'
		,'<blockquote>'
		,'</blockquote>'
		,'q'
	)
);

var dw_extendedStart = dw_edButtons.length;

// below here are the extended buttons

dw_edButtons.push(
	new dw_edButton(
		'ed_h1'
		,'H1'
		,'<h1>'
		,'</h1>\n\n'
		,'1'
	)
);

dw_edButtons.push(
	new dw_edButton(
		'ed_h2'
		,'H2'
		,'<h2>'
		,'</h2>\n\n'
		,'2'
	)
);

dw_edButtons.push(
	new dw_edButton(
		'ed_h3'
		,'H3'
		,'<h3>'
		,'</h3>\n\n'
		,'3'
	)
);

dw_edButtons.push(
	new dw_edButton(
		'ed_h4'
		,'H4'
		,'<h4>'
		,'</h4>\n\n'
		,'4'
	)
);

dw_edButtons.push(
	new dw_edButton(
		'ed_p'
		,'P'
		,'<p>'
		,'</p>\n\n'
		,'p'
	)
);

dw_edButtons.push(
	new dw_edButton(
		'ed_code'
		,'CODE'
		,'<code>'
		,'</code>'
		,'c'
	)
);

dw_edButtons.push(
	new dw_edButton(
		'ed_pre'
		,'PRE'
		,'<pre>'
		,'</pre>'
	)
);

dw_edButtons.push(
	new dw_edButton(
		'ed_dl'
		,'DL'
		,'<dl>\n'
		,'</dl>\n\n'
	)
);

dw_edButtons.push(
	new dw_edButton(
		'ed_dt'
		,'DT'
		,'\t<dt>'
		,'</dt>\n'
	)
);

dw_edButtons.push(
	new dw_edButton(
		'ed_dd'
		,'DD'
		,'\t<dd>'
		,'</dd>\n'
	)
);

dw_edButtons.push(
	new dw_edButton(
		'ed_table'
		,'TABLE'
		,'<table>\n<tbody>'
		,'</tbody>\n</table>\n'
	)
);

dw_edButtons.push(
	new dw_edButton(
		'ed_tr'
		,'TR'
		,'\t<tr>\n'
		,'\n\t</tr>\n'
	)
);

dw_edButtons.push(
	new dw_edButton(
		'ed_td'
		,'TD'
		,'\t\t<td>'
		,'</td>\n'
	)
);

dw_edButtons.push(
	new dw_edButton(
		'ed_ins'
		,'INS'
		,'<ins>'
		,'</ins>'
	)
);

dw_edButtons.push(
	new dw_edButton(
		'ed_del'
		,'DEL'
		,'<del>'
		,'</del>'
	)
);

dw_edButtons.push(
	new dw_edButton(
		'ed_nobr'
		,'NOBR'
		,'<nobr>'
		,'</nobr>'
	)
);

dw_edButtons.push(
	new dw_edButton(
		'ed_footnote'
		,'Footnote'
		,''
		,''
		,'f'
	)
);

dw_edButtons.push(
	new dw_edButton(
		'ed_via'
		,'Via'
		,''
		,''
		,'v'
	)
);

function dw_edLink(display, URL, newWin) {
	this.display = display;
	this.URL = URL;
	if (!newWin) {
		newWin = 0;
	}
	this.newWin = newWin;
}


dw_edLinks[dw_edLinks.length] = new dw_edLink('alexking.org'
                                    ,'http://www.alexking.org/'
                                    );

function dw_edShowButton(which, button, i) {
	if (button.access) {
		var accesskey = ' accesskey = "' + button.access + '"'
	}
	else {
		var accesskey = '';
	}
	switch (button.id) {
		case 'ed_img':
			document.write('<input type="button" id="' + button.id + '_' + which + '" ' + accesskey + ' class="dw_ed_button" onclick="dw_edInsertImage(\'' + which + '\');" value="' + button.display + '" />');
			break;
		case 'ed_link':
			document.write('<input type="button" id="' + button.id + '_' + which + '" ' + accesskey + ' class="dw_ed_button" onclick="dw_edInsertLink(\'' + which + '\', ' + i + ');" value="' + button.display + '" />');
			break;
		case 'ed_ext_link':
			document.write('<input type="button" id="' + button.id + '_' + which + '" ' + accesskey + ' class="dw_ed_button" onclick="dw_edInsertExtLink(\'' + which + '\', ' + i + ');" value="' + button.display + '" />');
			break;
		case 'ed_footnote':
			document.write('<input type="button" id="' + button.id + '_' + which + '" ' + accesskey + ' class="dw_ed_button" onclick="dw_edInsertFootnote(\'' + which + '\');" value="' + button.display + '" />');
			break;
		case 'ed_via':
			document.write('<input type="button" id="' + button.id + '_' + which + '" ' + accesskey + ' class="dw_ed_button" onclick="dw_edInsertVia(\'' + which + '\');" value="' + button.display + '" />');
			break;
		default:
			document.write('<input type="button" id="' + button.id + '_' + which + '" ' + accesskey + ' class="dw_ed_button" onclick="dw_edInsertTag(\'' + which + '\', ' + i + ');" value="' + button.display + '"  />');
			break;
	}
}

function dw_edShowLinks() {
	var tempStr = '<select onchange="dw_edQuickLink(this.options[this.selectedIndex].value, this);"><option value="-1" selected>(Quick Links)</option>';
	for (i = 0; i < edLinks.length; i++) {
		tempStr += '<option value="' + i + '">' + edLinks[i].display + '</option>';
	}
	tempStr += '</select>';
	document.write(tempStr);
}

function dw_edAddTag(which, button) {
	if (dw_edButtons[button].tagEnd != '') {
		dw_edOpenTags[which][dw_edOpenTags[which].length] = button;
		document.getElementById(dw_edButtons[button].id + '_' + which).value = '/' + document.getElementById(dw_edButtons[button].id + '_' + which).value;
	}
}

function dw_edRemoveTag(which, button) {
	for (i = 0; i < dw_edOpenTags[which].length; i++) {
		if (dw_edOpenTags[which][i] == button) {
			dw_edOpenTags[which].splice(i, 1);
			document.getElementById(dw_edButtons[button].id + '_' + which).value = document.getElementById(dw_edButtons[button].id + '_' + which).value.replace('/', '');
		}
	}
}

function dw_edCheckOpenTags(which, button) {
	var tag = 0;
	for (i = 0; i < dw_edOpenTags[which].length; i++) {
		if (dw_edOpenTags[which][i] == button) {
			tag++;
		}
	}
	if (tag > 0) {
		return true; // tag found
	}
	else {
		return false; // tag not found
	}
}	

function dw_edCloseAllTags(which) {
	var count = dw_edOpenTags[which].length;
	for (o = 0; o < count; o++) {
		dw_edInsertTag(which, dw_edOpenTags[which][dw_edOpenTags[which].length - 1]);
	}
}

function dw_edQuickLink(i, thisSelect) {
	if (i > -1) {
		var newWin = '';
		if (dw_edLinks[i].newWin == 1) {
			newWin = ' target="_blank"';
		}
		var tempStr = '<a href="' + dw_edLinks[i].URL + '"' + newWin + '>' 
		            + dw_edLinks[i].display
		            + '</a>';
		thisSelect.selectedIndex = 0;
		dw_edInsertContent(dw_edCanvas, tempStr);
	}
	else {
		thisSelect.selectedIndex = 0;
	}
}

function dw_edSpell(which) {
    myField = document.getElementById(which);
	var word = '';
	if (document.selection) {
		myField.focus();
	    var sel = document.selection.createRange();
		if (sel.text.length > 0) {
			word = sel.text;
		}
	}
	else if (myField.selectionStart || myField.selectionStart == '0') {
		var startPos = myField.selectionStart;
		var endPos = myField.selectionEnd;
		if (startPos != endPos) {
			word = myField.value.substring(startPos, endPos);
		}
	}
	if (word == '') {
		word = prompt('Enter a word to look up:', '');
	}
	if (word != '') {
		window.open(dictionaryUrl + escape(word));
	}
}

function dw_edToolbar(which) {
	document.write('<div id="dw_ed_toolbar_' + which + '"><span>');
	for (i = 0; i < dw_extendedStart; i++) {
		dw_edShowButton(which, dw_edButtons[i], i);
	}
	if (dw_edShowExtraCookie()) {
		document.write(
			'<input type="button" id="dw_ed_close_' + which + '" class="dw_ed_button" onclick="dw_edCloseAllTags(\'' + which + '\');" value="Close Tags" />'
			+ '<input type="button" id="dw_ed_spell_' + which + '" class="dw_ed_button" onclick="dw_edSpell(\'' + which + '\');" value="Dict" />'
			+ '<input type="button" id="dw_ed_extra_show_' + which + '" class="dw_ed_button" onclick="dw_edShowExtra(\'' + which + '\')" value="&raquo;" style="visibility: hidden;" />'
			+ '</span><br />'
			+ '<span id="dw_ed_extra_buttons_' + which + '">'
			+ '<input type="button" id="dw_ed_extra_hide_' + which + '" class="dw_ed_button" onclick="dw_edHideExtra(\'' + which + '\');" value="&laquo;" />'
		);
	}
	else {
		document.write(
			'<input type="button" id="dw_ed_close_' + which + '" class="dw_ed_button" onclick="dw_edCloseAllTags(\'' + which + '\');" value="Close Tags" />'
			+ '<input type="button" id="dw_ed_spell_' + which + '" class="dw_ed_button" onclick="dw_edSpell(\'' + which + '\');" value="Dict" />'
			+ '<input type="button" id="dw_ed_extra_show_' + which + '" class="dw_ed_button" onclick="dw_edShowExtra(\'' + which + '\')" value="&raquo;" />'
			+ '</span><br />'
			+ '<span id="dw_ed_extra_buttons_' + which + '" style="display: none;">'
			+ '<input type="button" id="dw_ed_extra_hide_' + which + '" class="dw_ed_button" onclick="dw_edHideExtra(\'' + which + '\');" value="&laquo;" />'
		);
	}
	for (i = dw_extendedStart; i < dw_edButtons.length; i++) {
		dw_edShowButton(which, dw_edButtons[i], i);
	}
	document.write('</span>');
//	edShowLinks();
	document.write('</div>');
    dw_edOpenTags[which] = new Array();
}

function dw_edShowExtra(which) {
	document.getElementById('dw_ed_extra_show_' + which).style.visibility = 'hidden';
	document.getElementById('dw_ed_extra_buttons_' + which).style.display = 'block';
	dw_edSetCookie(
		'dw_js_quicktags_extra'
		, 'show'
		, new Date("December 31, 2100")
	);
}

function dw_edHideExtra(which) {
	document.getElementById('dw_ed_extra_buttons_' + which).style.display = 'none';
	document.getElementById('dw_ed_extra_show_' + which).style.visibility = 'visible';
	dw_edSetCookie(
		'dw_js_quicktags_extra'
		, 'hide'
		, new Date("December 31, 2100")
	);
}

// insertion code

function dw_edInsertTag(which, i) {
    myField = document.getElementById(which);
	//IE support
	if (document.selection) {
		myField.focus();
	    sel = document.selection.createRange();
		if (sel.text.length > 0) {
			sel.text = dw_edButtons[i].tagStart + sel.text + dw_edButtons[i].tagEnd;
		}
		else {
			if (!dw_edCheckOpenTags(which, i) || dw_edButtons[i].tagEnd == '') {
				sel.text = dw_edButtons[i].tagStart;
				dw_edAddTag(which, i);
			}
			else {
				sel.text = dw_edButtons[i].tagEnd;
				dw_edRemoveTag(which, i);
			}
		}
		myField.focus();
	}
	//MOZILLA/NETSCAPE support
	else if (myField.selectionStart || myField.selectionStart == '0') {
		var startPos = myField.selectionStart;
		var endPos = myField.selectionEnd;
		var cursorPos = endPos;
		var scrollTop = myField.scrollTop;
		if (startPos != endPos) {
			myField.value = myField.value.substring(0, startPos)
			              + dw_edButtons[i].tagStart
			              + myField.value.substring(startPos, endPos) 
			              + dw_edButtons[i].tagEnd
			              + myField.value.substring(endPos, myField.value.length);
			cursorPos += dw_edButtons[i].tagStart.length + dw_edButtons[i].tagEnd.length;
		}
		else {
			if (!dw_edCheckOpenTags(which, i) || dw_edButtons[i].tagEnd == '') {
				myField.value = myField.value.substring(0, startPos) 
				              + dw_edButtons[i].tagStart
				              + myField.value.substring(endPos, myField.value.length);
				dw_edAddTag(which, i);
				cursorPos = startPos + dw_edButtons[i].tagStart.length;
			}
			else {
				myField.value = myField.value.substring(0, startPos) 
				              + dw_edButtons[i].tagEnd
				              + myField.value.substring(endPos, myField.value.length);
				dw_edRemoveTag(which, i);
				cursorPos = startPos + dw_edButtons[i].tagEnd.length;
			}
		}
		myField.focus();
		myField.selectionStart = cursorPos;
		myField.selectionEnd = cursorPos;
		myField.scrollTop = scrollTop;
	}
	else {
		if (!dw_edCheckOpenTags(which, i) || dw_edButtons[i].tagEnd == '') {
			myField.value += dw_edButtons[i].tagStart;
			dw_edAddTag(which, i);
		}
		else {
			myField.value += dw_edButtons[i].tagEnd;
			dw_edRemoveTag(which, i);
		}
		myField.focus();
	}
}

function dw_edInsertContent(which, myValue) {
    myField = document.getElementById(which);
	//IE support
	if (document.selection) {
		myField.focus();
		sel = document.selection.createRange();
		sel.text = myValue;
		myField.focus();
	}
	//MOZILLA/NETSCAPE support
	else if (myField.selectionStart || myField.selectionStart == '0') {
		var startPos = myField.selectionStart;
		var endPos = myField.selectionEnd;
		var scrollTop = myField.scrollTop;
		myField.value = myField.value.substring(0, startPos)
		              + myValue 
                      + myField.value.substring(endPos, myField.value.length);
		myField.focus();
		myField.selectionStart = startPos + myValue.length;
		myField.selectionEnd = startPos + myValue.length;
		myField.scrollTop = scrollTop;
	} else {
		myField.value += myValue;
		myField.focus();
	}
}

function dw_edInsertLink(which, i, defaultValue) {
    myField = document.getElementById(which);
	if (!defaultValue) {
		defaultValue = 'http://';
	}
	if (!dw_edCheckOpenTags(which, i)) {
		var URL = prompt('Enter the URL' ,defaultValue);
		if (URL) {
			dw_edButtons[i].tagStart = '<a href="' + URL + '">';
			dw_edInsertTag(which, i);
		}
	}
	else {
		dw_edInsertTag(which, i);
	}
}

function dw_edInsertExtLink(which, i, defaultValue) {
    myField = document.getElementById(which);
	if (!defaultValue) {
		defaultValue = 'http://';
	}
	if (!dw_edCheckOpenTags(which, i)) {
		var URL = prompt('Enter the URL' ,defaultValue);
		if (URL) {
			dw_edButtons[i].tagStart = '<a href="' + URL + '" rel="external">';
			dw_edInsertTag(which, i);
		}
	}
	else {
		dw_edInsertTag(which, i);
	}
}

function dw_edInsertImage(which) {
    myField = document.getElementById(which);
	var myValue = prompt('Enter the URL of the image', 'http://');
	if (myValue) {
		myValue = '<img src="' 
				+ myValue 
				+ '" alt="' + prompt('Enter a description of the image', '') 
				+ '" />';
		dw_edInsertContent(which, myValue);
	}
}

function dw_edInsertFootnote(which) {
    myField = document.getElementById(which);
	var note = prompt('Enter the footnote:', '');
	if (!note || note == '') {
		return false;
	}
	var now = new Date;
	var fnId = 'fn' + now.getTime();
	var fnStart = myField.value.indexOf('<ol class="footnotes">');
	if (fnStart != -1) {
		var fnStr1 = myField.value.substring(0, fnStart)
		var fnStr2 = myField.value.substring(fnStart, myField.value.length)
		var count = countInstances(fnStr2, '<li id="') + 1;
	}
	else {
		var count = 1;
	}
	var count = '<sup><a href="#' + fnId + 'n" id="' + fnId + '" class="footnote">' + count + '</a></sup>';
	dw_edInsertContent(which, count);
	if (fnStart != -1) {
		fnStr1 = myField.value.substring(0, fnStart + count.length)
		fnStr2 = myField.value.substring(fnStart + count.length, myField.value.length)
	}
	else {
		var fnStr1 = myField.value;
		var fnStr2 = "\n\n" + '<ol class="footnotes">' + "\n"
		           + '</ol>' + "\n";
	}
	var footnote = '	<li id="' + fnId + 'n">' + note + ' [<a href="#' + fnId + '">back</a>]</li>' + "\n"
				 + '</ol>';
	myField.value = fnStr1 + fnStr2.replace('</ol>', footnote);
}

function countInstances(string, substr) {
	var count = string.split(substr);
	return count.length - 1;
}

function dw_edInsertVia(which) {
    myField = document.getElementById(which);
	var myValue = prompt('Enter the URL of the source link', 'http://');
	if (myValue) {
		myValue = '(Thanks <a href="' + myValue + '" rel="external">'
				+ prompt('Enter the name of the source', '') 
				+ '</a>)';
		dw_edInsertContent(which, myValue);
	}
}


function dw_edSetCookie(name, value, expires, path, domain) {
	document.cookie= name + "=" + escape(value) +
		((expires) ? "; expires=" + expires.toGMTString() : "") +
		((path) ? "; path=" + path : "") +
		((domain) ? "; domain=" + domain : "");
}

function dw_edShowExtraCookie() {
	var cookies = document.cookie.split(';');
	for (var i=0;i < cookies.length; i++) {
		var cookieData = cookies[i];
		while (cookieData.charAt(0) ==' ') {
			cookieData = cookieData.substring(1, cookieData.length);
		}
		if (cookieData.indexOf('dw_js_quicktags_extra') == 0) {
			if (cookieData.substring(19, cookieData.length) == 'show') {
				return true;
			}
			else {
				return false;
			}
		}
	}
	return false;
}
