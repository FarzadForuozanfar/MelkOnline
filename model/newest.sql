USE melkonline;
SELECT h.id, h.title,count(hi.url) AS 'total' FROM houses h 
LEFT join house_images hi on hi.house_id = h.id
GROUP by h.id
ORDER BY h.created_at DESC 
LIMIT 5 