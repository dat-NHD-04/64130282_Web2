package thiGK.ntu64130282.nguyenhuydat_ThiGK.model;

public class Page {
    private int id;
    private String pageName;
    private String keyword;
    private String viewUrl;
    private String editUrl;
    private String deleteUrl;

    public Page(int id, String pageName, String keyword, String viewUrl, String editUrl, String deleteUrl) {
        this.id = id;
        this.pageName = pageName;
        this.keyword = keyword;
        this.viewUrl = viewUrl;
        this.editUrl = editUrl;
        this.deleteUrl = deleteUrl;
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

    public String getViewUrl() {
        return viewUrl;
    }

    public void setViewUrl(String viewUrl) {
        this.viewUrl = viewUrl;
    }

    public String getEditUrl() {
        return editUrl;
    }

    public void setEditUrl(String editUrl) {
        this.editUrl = editUrl;
    }

    public String getDeleteUrl() {
        return deleteUrl;
    }

    public void setDeleteUrl(String deleteUrl) {
        this.deleteUrl = deleteUrl;
    }
}
