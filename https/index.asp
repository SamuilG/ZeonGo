<%EnableSessionState=False
host = Request.ServerVariables("HTTP_HOST")

if host = "example.com" or host = "www.example.com" then
response.redirect("https://www.zeongo.online/")

else
response.redirect("https://www.zeongo.online/error.htm")

end if
%>