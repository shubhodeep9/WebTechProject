<html>
<head>
<title>Matrix Multiplication</title>
</head>
<body>
<%-- This is a JSP Comment before JSP Scriplet --%>
<%
int c,d,k;
int sum = 0;
int[][] first={{1,2,3},{4,5,6},{7,8,9}};
int[][] second={{9,8,7},{6,5,4},{3,2,1}};
int[][] multiply=new int[3][3];


for ( c = 0 ; c < 3 ; c++ ){
    for ( d = 0 ; d < 3 ; d++ ){   
       for ( k = 0 ; k < 3 ; k++ ){
          sum = sum + first[c][k]*second[k][d];
       }
       multiply[c][d] = sum;
       sum = 0;
    }
}

for ( c = 0 ; c < 3 ; c++ )
         {
            for ( d = 0 ; d < 3 ; d++ )
               out.print(multiply[c][d]+"\t");
 
            out.print("\n");
         }
%>
</body>
</html>
