<form action="./187-searchResult.php" name="search" method="post">
    <input type="text" name="searchKeyword" placeholder="검색어 입력" required />
    <select name="option" required>
        <option value="title">제목</option>
        <option value="title">내용</option>
        <option value="tandc">제목과 내용</option>
        <option value="torc">제목 또는 내용</option>
    </select>
    <input type="submit" value="검색" />
</form>