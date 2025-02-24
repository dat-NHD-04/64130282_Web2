<%@ page language="java" contentType="text/html; charset=UTF-8" pageEncoding="UTF-8" %>
<%
    // Lấy dữ liệu từ form
    String username = request.getParameter("username");
    String password = request.getParameter("password");

    // Kiểm tra thông tin đăng nhập
    if("ABC".equals(username) && "MNK".equals(password)) {
        response.sendRedirect("UserProfile.htm"); // Chuyển hướng đến trang UserProfile
    } else {
        response.sendRedirect("Login.htm"); // Quay lại trang đăng nhập nếu sai
    }
%>
