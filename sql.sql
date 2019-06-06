UPDATE gs_bm_table SET bookname='A',bookurl='A',bookcoment='書籍コメント' WHERE id=1;

UPDATE gs_bm_table SET bookname=:bookname,bookurl=:bookurl,bookcoment=:bookcoment WHERE id=:id;
