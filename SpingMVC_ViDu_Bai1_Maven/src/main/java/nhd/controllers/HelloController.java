package nhd.controllers;
import org.springframework.stereotype.Controller;
import org.springframework.web.bind.annotation.RequestMapping;
@Controller
public class HelloController {
	//URL: http://ten-mien:cong//HelloSpringMVC/say-hi
	@RequestMapping("say hi")
 public String SayHello() {
	 return"xin chao";
 }
}
