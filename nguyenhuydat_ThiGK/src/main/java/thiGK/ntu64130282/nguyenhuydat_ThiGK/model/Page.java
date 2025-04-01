package thiGK.ntu64130282.nguyenhuydat_ThiGK.model;

public class Page {
    private int id;
    private String pageName;
    private String keyword;
    private String content;

    public Page(int id, String pageName, String keyword, String content) {
        this.id = id;
        this.pageName = pageName;
        this.keyword = keyword;
        this.content = content;
    }

    public int getId() {
        return id;
    }

    public void setId(int id) {
        this.id = id;
    }

    public String getPageName() {
        return pageName;
    }

    public void setPageName(String pageName) {
        this.pageName = pageName;
    }

    public String getKeyword() {
        return keyword;
    }

    public void setKeyword(String keyword) {
        this.keyword = keyword;
    }

    public String getContent() {
        return content;
    }

    public void setContent(String content) {
        this.content = content;
    }
}