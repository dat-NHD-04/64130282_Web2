package webBlog.ntu.nhd.Web_Java.service;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.beans.factory.annotation.Value;
import org.springframework.jdbc.core.JdbcTemplate;
import org.springframework.stereotype.Service;
import org.springframework.web.multipart.MultipartFile;

import java.io.IOException;
import java.nio.file.*;
import java.util.*;

@Service
public class FileStorageService {

    @Value("${app.upload.dir}")
    private String uploadDir;

    @Autowired
    private JdbcTemplate jdbcTemplate;

    //Lưu nhiều ảnh vào bảng post_images
    public List<String> storeFiles(MultipartFile[] files, Long postId) throws IOException {
        List<String> savedFileNames = new ArrayList<>();

        Path uploadPath = Paths.get(uploadDir);
        if (!Files.exists(uploadPath)) {
            Files.createDirectories(uploadPath);
        }

        for (MultipartFile file : files) {
            if (!file.isEmpty()) {
                String fileName = UUID.randomUUID() + getFileExtension(file.getOriginalFilename());
                Path filePath = uploadPath.resolve(fileName);

                try (var inputStream = file.getInputStream()) {
                    Files.copy(inputStream, filePath, StandardCopyOption.REPLACE_EXISTING);
                }

                String imageUrl = "/" + uploadDir + "/" + fileName;

                jdbcTemplate.update("INSERT INTO post_image (post_id, image_url) VALUES (?, ?)", postId, imageUrl);
                savedFileNames.add(fileName);
            }
        }

        return savedFileNames;
    }

    // Dùng khi chỉnh sửa ảnh đại diện (1 ảnh)
    public String storeFile(MultipartFile file) throws IOException {
        String fileName = UUID.randomUUID() + getFileExtension(file.getOriginalFilename());
        Path uploadPath = Paths.get(uploadDir);

        if (!Files.exists(uploadPath)) {
            Files.createDirectories(uploadPath);
        }

        Path filePath = uploadPath.resolve(fileName);
        Files.copy(file.getInputStream(), filePath, StandardCopyOption.REPLACE_EXISTING);

        return fileName;
    }

    private String getFileExtension(String originalFilename) {
        if (originalFilename == null || !originalFilename.contains(".")) {
            return "";
        }
        return originalFilename.substring(originalFilename.lastIndexOf("."));
    }
}
