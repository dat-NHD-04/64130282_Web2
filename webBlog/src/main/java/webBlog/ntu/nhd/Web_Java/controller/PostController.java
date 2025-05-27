package webBlog.ntu.nhd.Web_Java.controller;

import org.springframework.beans.factory.annotation.Value;
import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.*;
import org.springframework.web.multipart.MultipartFile;

import webBlog.ntu.nhd.Web_Java.model.entity.Category;
import webBlog.ntu.nhd.Web_Java.model.entity.Post;
import webBlog.ntu.nhd.Web_Java.service.CategoryService;
import webBlog.ntu.nhd.Web_Java.service.FileStorageService;
import webBlog.ntu.nhd.Web_Java.service.PostService;

import java.io.IOException;

@Controller
@RequestMapping("/posts")
public class PostController {

    private final PostService postService;
    private final CategoryService categoryService;
    private final FileStorageService fileStorageService;

    @Value("${app.upload.dir}")
    private String uploadDir;

    public PostController(PostService postService,
                          CategoryService categoryService,
                          FileStorageService fileStorageService) {
        this.postService = postService;
        this.categoryService = categoryService;
        this.fileStorageService = fileStorageService;
    }

    // Danh sách bài viết
    @GetMapping
    public String listPosts(Model model) {
        model.addAttribute("posts", postService.getAllPosts());
        return "posts/list";
    }

    // Hiển thị form tạo bài viết
    @GetMapping("/new")
    public String showCreateForm(Model model) {
        model.addAttribute("post", new Post());
        model.addAttribute("categories", categoryService.getAllCategories());
        return "posts/create";
    }

    // Xử lý tạo bài viết mới (hỗ trợ upload nhiều ảnh)
    @PostMapping("/new")
    public String createPost(@ModelAttribute Post post,
                             @RequestParam("imageFiles") MultipartFile[] imageFiles) throws IOException {
        if (post.getCategory() != null && post.getCategory().getId() != null) {
            Category category = categoryService.getCategoryById(post.getCategory().getId());
            post.setCategory(category);
        } else {
            post.setCategory(null);
        }

        Post savedPost = postService.savePost(post); // Lưu trước để có ID
        fileStorageService.storeFiles(imageFiles, savedPost.getId()); // Lưu nhiều ảnh gắn với post_id
        return "redirect:/posts";
    }

    // Hiển thị form chỉnh sửa bài viết
    @GetMapping("/edit/{id}")
    public String showEditForm(@PathVariable Long id, Model model) {
        Post post = postService.getPostById(id);
        model.addAttribute("post", post);
        model.addAttribute("categories", categoryService.getAllCategories());
        return "posts/edit";
    }

    // Xử lý cập nhật bài viết
    @PostMapping("/edit/{id}")
    public String updatePost(@PathVariable Long id,
                             @ModelAttribute Post post,
                             @RequestParam(value = "imageFile", required = false) MultipartFile imageFile) throws IOException {
        if (post.getCategory() != null && post.getCategory().getId() != null) {
            Category category = categoryService.getCategoryById(post.getCategory().getId());
            post.setCategory(category);
        } else {
            post.setCategory(null);
        }

        // Nếu có ảnh mới, cập nhật ảnh
        if (imageFile != null && !imageFile.isEmpty()) {
            String fileName = fileStorageService.storeFile(imageFile);
            post.setImageUrl("/" + uploadDir + "/" + fileName);
        }

        post.setId(id);
        postService.savePost(post);
        return "redirect:/posts";
    }

    // Xoá bài viết (đảm bảo xoá ảnh trước trong service để tránh lỗi ràng buộc khóa ngoại)
    @GetMapping("/delete/{id}")
    public String deletePost(@PathVariable Long id) {
        postService.deletePost(id); // Trong hàm này, bạn cần xóa các ảnh liên quan trước khi xóa bài viết
        return "redirect:/posts";
    }

    // Tìm kiếm bài viết
    @GetMapping("/search")
    public String searchPosts(@RequestParam String keyword, Model model) {
        model.addAttribute("posts", postService.searchPosts(keyword));
        model.addAttribute("keyword", keyword);
        return "posts/list";
    }
}
