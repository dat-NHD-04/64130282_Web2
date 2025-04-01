package thiGK.ntu64130282.nguyenhuydat_ThiGK.PostController;

import java.util.ArrayList;
import java.util.Arrays;

import org.springframework.stereotype.Controller;
import org.springframework.ui.ModelMap;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestParam;

import thiGK.ntu64130282.nguyenhuydat_ThiGK.model.Post;



@Controller
@RequestMapping("/dashboard")
public class PostController {
	private ArrayList<Post> posts = new ArrayList<>(Arrays.asList(
            new Post(1, "Bài viết 1", "1", "/post/view/1", "/post/edit/1", "/post/delete/1"),
            new Post(2, "Bài viết 2", "2", "/post/view/2", "/post/edit/2", "/post/delete/2"),
            new Post(3, "Bài viết 3", "3", "/post/view/3", "/post/edit/3", "/post/delete/3")
    ));
	
	@GetMapping("/dashboard")
	public String dashboard() {
		return "dashboard";
	}
	@GetMapping("/post/list")
    public String listPosts(ModelMap model) {
        model.addAttribute("posts", posts);
        return "postList";
    }

    @GetMapping("/post/addnew")
    public String addNewPostForm() {
        return "postAddnew";
    }

    @PostMapping("/post/add")
    public String addPost(@RequestParam("id") int id, 
                          @RequestParam("title") String title, 
                          @RequestParam("categoryId") String categoryId, 
                          ModelMap model) {
        String viewUrl = "/post/view/" + id;
        String editUrl = "/post/edit/" + id;
        String deleteUrl = "/post/delete/" + id;
        
        posts.add(new Post(id, title, categoryId, viewUrl, editUrl, deleteUrl));
        model.addAttribute("posts", posts);
        return "postList";
    }

}
