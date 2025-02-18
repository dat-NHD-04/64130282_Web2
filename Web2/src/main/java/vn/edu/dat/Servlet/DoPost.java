package vn.edu.dat.Servlet;

import java.io.IOException;
import java.io.PrintWriter;

import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

@WebServlet("/DoPost")
public class DoPost extends HttpServlet {

	protected void doGet(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
		response.setContentType("text/html");
		response.setCharacterEncoding("utf-8");
		PrintWriter traVe =response.getWriter();
		traVe.append("Bạn vừa gửi yêu cầu dạng GET, đây là đáp ứng của tôi");
		String noiDungHTML ="<form method = POST action=\"/ViduServlet/DoPost\">"
				+ "<label >Họ:</label>"
				+ "<input type=\"text\" name=\"fname\"><br>\r\n"
				+ "<label> Tên:</label>"
				+ "<input type=\"text\" name=\"lname\"><br>"
				+ "<innput type=\"submit\" value=\"Gửi đi\">"
				+ "</form>";
		traVe.append(noiDungHTML);
	}

	
	protected void doPost(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
		response.setContentType("text/html");
		response.setCharacterEncoding("utf-8");
		String value1=request.getParameter("fname");
		String value2=request.getParameter("lname");
		PrintWriter traVe=response.getWriter();
		traVe.append("Bạn vừa gửi yêu cầu dạng POST, đây là đáp ứng của tôi");
		traVe.append("Giá trị tham số fname =");
		traVe.append(value1);
		traVe.append("Giá trị tham số lname =");
		traVe.append(value2);
	}

}
