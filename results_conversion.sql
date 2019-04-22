use results;
insert into resultsv2.exam
select * from exam;
insert into resultsv2.proces
select * from proces;
insert into resultsv2.assignment
select * from assignment;
insert into resultsv2.aspect
select * from aspect;
insert into resultsv2.basegroup
select * from basegroup;
insert into resultsv2.student
select * from student;
insert into resultsv2.user
select * from user;

insert into resultsv2.role (description) values ('administrator');
insert into resultsv2.role (description) values ('assessor');

insert into resultsv2.user_has_role (iduser, idrole) values (1,1);
insert into resultsv2.user_has_role (iduser, idrole) values (1,2);

insert into resultsv2.exam_result 
select distinct r.exam_date, r.idstudent, e.idexam, er.comment, 1 as assessor1, 7 as assessor2  from result as r
join aspect as a on a.idaspect = r.idaspect
join assignment as ass on ass.idassignment = a.idassignment
join proces as p on p.idproces = ass.idproces
join exam as e on p.idexam = e.idexam
left join result_comment as er on er.exam_date = r.exam_date and er.idstudent = r.idstudent
order by idstudent, exam_date;


insert into resultsv2.result
select  r.exam_date, r.idstudent, e.idexam, a.idaspect from result as r
join aspect as a on a.idaspect = r.idaspect
join assignment as ass on ass.idassignment = a.idassignment
join proces as p on p.idproces = ass.idproces
join exam as e on p.idexam = e.idexam
order by idstudent, exam_date, idaspect;