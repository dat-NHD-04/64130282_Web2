package thiGK.ntu64130282.nguyenhuydat_ThiGK.controller;

import java.util.ArrayList;
import java.util.Arrays;

import org.springframework.stereotype.Controller;
import org.springframework.ui.ModelMap;
import org.springframework.web.bind.annotation.*;

import thiGK.ntu64130282.nguyenhuydat_ThiGK.model.Page;
import thiGK.ntu64130282.nguyenhuydat_ThiGK.model.Post;

@Controller
@RequestMapping("/dashboard")
public class WebController {
    private ArrayList<Page> pages = new ArrayList<>(Arrays.asList(
            new Page(1, "Trang chủ", "home", "/page/view/1", "/page/edit/1", "/page/delete/1"),
            new Page(2, "Giới thiệu", "about", "/page/view/2", "/page/edit/2", "/page/delete/2"),
            new Page(3, "Liên hệ", "contact", "/page/view/3", "/page/edit/3", "/page/delete/3")
    ));

    private ArrayList<Post> posts = new ArrayList<>(Arrays.asList(
            new Post(1, "Bài viết 1", "1", "/post/view/1", "/post/edit/1", "/post/delete/1"),
            new Post(2, "Bài viết 2", "2", "/post/view/2", "/post/edit/2", "/post/delete/2"),
            new Post(3, "Bài viết 3", "3", "/post/view/3", "/post/edit/3", "/post/delete/3")
    ));

    @GetMapping("/page/list")
    public String listPages(ModelMap model) {
        model.addAttribute("pages", pages);
        return "pageList";
    }

    @GetMapping("/page/addnew")
    public String addNewPageForm() {
        return "pageAddnew";
    }

    @PostMapping("/page/add")
    public String addPage(@RequestParam("id") int id, 
                          @RequestParam("pageName") String pageName, 
                          @RequestParam("keyword") String keyword, 
                          ModelMap model) {
        String viewUrl = "/page/view/" + id;
        String editUrl = "/page/edit/" + id;
        String deleteUrl = "/page/delete/" + id;
        
        pages.add(new Page(id, pageName, keyword, viewUrl, editUrl, deleteUrl));
        model.addAttribute("pages", pages);
        return "pageList";
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

