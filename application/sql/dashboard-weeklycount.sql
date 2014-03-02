select
count( case when date=curdate() then  1 end) as words,
dayname(curdate()) as day
from words
where uid=<uid>
union
select
count( case when date=curdate()  - INTERVAL 1 day then  1 end) as words,
dayname(curdate() - INTERVAL 1 day) as day
from words
where uid=<uid>
union
select
count( case when date=curdate()  - INTERVAL 2 day then  1 end) as words,
dayname(curdate() - INTERVAL 2 day) as day
from words
where uid=<uid>
union
select
count( case when date=curdate()  - INTERVAL 3 day then  1 end) as words,
dayname(curdate() - INTERVAL 3 day) as day
from words
where uid=<uid>
union
select
count( case when date=curdate()  - INTERVAL 4 day then  1 end) as words,
dayname(curdate() - INTERVAL 4 day) as day
from words
where uid=<uid>
union
select
count( case when date=curdate()  - INTERVAL 5 day then  1 end) as words,
dayname(curdate() - INTERVAL 5 day) as day
from words
where uid=<uid>
union
select
count( case when date=curdate()  - INTERVAL 6 day then  1 end) as words,
dayname(curdate() - INTERVAL 6 day) as day
from words
where uid=<uid>