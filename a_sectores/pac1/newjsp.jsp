<%-- 
    Document   : newjsp
    Created on : 06/10/2014, 15:58:33
    Author     : Familia Rios
--%>

<%@page contentType="text/html" pageEncoding="UTF-8"%>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>JSP Page</title>
    </head>
    <body>
        <h1>    <%-- start web service invocation --%><hr/>
    <%
    try {
	ws.PAMIMENDOZA service = new ws.PAMIMENDOZA();
	ws.PAMIMENDOZASoap port = service.getPAMIMENDOZASoap();
	 // TODO initialize WS operation arguments here
	java.lang.String pParameters = "<?xml version='1.0' encoding='iso-8859-1'?><Requerimiento><Bioquimico CodUsu='99999' Clave='99999'/><Afiliado NroAfi='15042960980102'/></Requerimiento>";
	// TODO process result here
	java.lang.String result = port.pamiMendozaAfiliadoConsulta(pParameters);
	out.println("Result = "+result);
    } catch (Exception ex) {
	// TODO handle custom exceptions here
    }
    %>
    <%-- end web service invocation --%><hr/>
Hello World!</h1>
    </body>
</html>
