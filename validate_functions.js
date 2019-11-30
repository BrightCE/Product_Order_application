/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

function validate(form)
{
	fail  = validatename(form.name.value)
	fail += validateEmail(form.email.value)
    fail += validatemessage(form.message.value)
	if (fail == "")
        {
           return true
        }
	else {
        alert(fail); return false }
}

function vEmail(field,num) {var id = num;
	if (field.value == "")
        {

            document.getElementById(id).innerHTML="* No email was entered"
        }
		else if (!((field.value.indexOf(".") > 0) &&
			     (field.value.indexOf("@") > 0)) ||
			    /[^a-zA-Z0-9.@_-]/.test(field.value))
                {
                    document.getElementById(id).innerHTML="* Invalid email"
                    
                }
		
	else{
        document.getElementById(id).innerHTML=""
    }
}

function vname(field,num) {var id = num;
	if (field.value == "")
        {
            document.getElementById(id).innerHTML="* No name was entered"
          
        }
	else{
        document.getElementById(id).innerHTML=""
    }
}

function vfeild(field,num)
    {
        var id = num;
        if (field.value == "")
        {
            document.getElementById(id).innerHTML="* Empty field."

        }
	else{
        document.getElementById(id).innerHTML=""
    }
    }

function vmessage(num) {var id = num;
    var a = document.form.message.value

	if (a == "")
        {
            document.getElementById(id).innerHTML="* No message was entered"
           
        }
    
	else{
        document.getElementById(id).innerHTML=""
    }
}

function validateEmail(field) {
	if (field == "")
        {
            return "No email was entered.\n"
        }
		else if (!((field.indexOf(".") > 0) &&
			     (field.indexOf("@") > 0)) ||
			    /[^a-zA-Z0-9.@_-]/.test(field.value))
                {
                    return "The Email address is invalid.\n"
                }

	return ""
}

function validatename(field) {
	if (field == "")
        {
           return "No name was entered.\n"
        }
	return ""
}

function validatemessage(field) {
	if (field == "")
        {
            return "No message was entered.\n"
        }
	return ""
}

function send_form_data(){
   
   var name = document.getElementById('f11').value
    var email = document.getElementById('f22').value
   var message = document.getElementById('f33').value
   
    params  = "name="+name+"&email="+email+"&message="+message;
    request = new ajaxRequest()
    request.open("POST", "contact.php", true)
    request.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
    request.setRequestHeader("Content-length", params.length)
    request.setRequestHeader("Connection", "close")

    request.onreadystatechange = function()
    {
        if (this.readyState == 4)
            if (this.status == 200)
                if (this.responseText != null)
                 document.getElementById('info').innerHTML = this.responseText
    }
    request.send(params)
    clearText()
}



function ajaxRequest()
{
    try { var request = new XMLHttpRequest() }
    catch(e1) {
        try { request = new ActiveXObject("Msxml2.XMLHTTP") }
        catch(e2) {
            try { request = new ActiveXObject("Microsoft.XMLHTTP") }
            catch(e3) {
                request = false
    }   }   }
    return request
}

function clearText()
{
    if (document.getElementById('f11').value == '')
        {
            document.getElementById('f11').value = ''
        }
        else{
            document.getElementById('f11').value = ''
        }

   if (document.getElementById('f22').value == '')
        {
            document.getElementById('f22').value = ''
        }
        else{
            document.getElementById('f22').value = ''
        }

        if (document.getElementById('f33').value == '')
        {
            document.getElementById('f33').value = ''
        }
        else{
            document.getElementById('f33').value = ''
        }

}

function login_form(num)
{
     params  = "func_id="+num;
      request = new ajaxRequest()
    request.open("POST", "adminfunction.php", true)
    request.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
    request.setRequestHeader("Content-length", params.length)
    request.setRequestHeader("Connection", "close")

    request.onreadystatechange = function()
    {
        if (this.readyState == 4)
            if (this.status == 200)
                if (this.responseText != null)
                 document.getElementById('info').innerHTML = this.responseText
    }
    request.send(params)
}