<html>
<head>
<title>Matrix Multiplication</title>
</head>
<body>
<%-- This is a JSP Comment before JSP Scriplet --%>
<%
int number = 28;
int temp = 0;
        for(int i=1;i<=number/2;i++){
            if(number%i == 0){
                temp += i;
            }
        }
        if(temp == number){
            out.println("It is a perfect number");
        } else {
            out.println("It is not a perfect number");
        }
%>
</body>
</html>
