<?php
$topdir = "../../..";
$title = "MPI_Status_f2c(3) man page (version 1.5.5)";
$meta_desc = "Open MPI v1.5.5 man page: MPI_STATUS_F2C(3)";

include_once("$topdir/doc/nav.inc");
include_once("$topdir/includes/header.inc");
?>
<p> <a href="../">&laquo; Return to documentation listing</a></p>
  <!-- manual page source format generated by PolyglotMan v3.2, -->
<!-- available at http://polyglotman.sourceforge.net/ -->

<body bgcolor='white'>
<a href='#toc'>Table of Contents</a><p>

<h2><a name='sect0' href='#toc0'>Name</a></h2>
<b>MPI_Status_f2c, <a href="../man3/MPI_Status_c2f.3.php">MPI_Status_c2f</a> </b> - Translates a C status into a Fortran
status, or vice versa.
<p>
<h2><a name='sect1' href='#toc1'>Syntax</a></h2>

<h2><a name='sect2' href='#toc2'>C Syntax</a></h2>
<br>
<pre>#include &lt;mpi.h&gt;
int MPI_Status_f2c(MPI_Fint *f_status, MPI_Status *c_status)
int <a href="../man3/MPI_Status_c2f.3.php">MPI_Status_c2f</a>(MPI_Status *c_status, MPI_Fint *f_status)
</pre>
<h2><a name='sect3' href='#toc3'>Description</a></h2>
These two procedures are provided in C to convert from a Fortran
status (which is an array of integers) to a C status (which is a structure),
and vice versa. The conversion occurs on all the information in <i>status</i>,
including that which is hidden. That is, no status information is lost in
the conversion.  <p>
When using MPI_Status_f2c, if <i>f_status</i> is a valid Fortran
status, but not the Fortran value of MPI_STATUS_IGNORE or MPI_STATUSES_IGNORE,
then MPI_Status_f2c returns in <i>c_status</i> a valid C status with the same
content. If <i>f_status</i> is the Fortran value of MPI_STATUS_IGNORE or MPI_STATUSES_IGNORE,
or if <i>f_status</i> is not a valid Fortran status, then the call is erroneous.
 <p>
When using <a href="../man3/MPI_Status_c2f.3.php">MPI_Status_c2f</a>, the opposite conversion is applied. If <i>c_status</i>
is MPI_STATUS_IGNORE or MPI_STATUSES_IGNORE, or if <i>c_status</i> is not a valid
C status, then the call is erroneous. <p>
The C status has the same source,
tag and error code values as the Fortran status, and returns the same answers
when queried for count, elements, and cancellation. The conversion function
may be called with a Fortran status argument that has an undefined error
field, in which case the value of the error field in the C status argument
is undefined.  <p>

<p>
<p> <p>

<hr><p>
<a name='toc'><b>Table of Contents</b></a><p>
<ul>
<li><a name='toc0' href='#sect0'>Name</a></li>
<li><a name='toc1' href='#sect1'>Syntax</a></li>
<li><a name='toc2' href='#sect2'>C Syntax</a></li>
<li><a name='toc3' href='#sect3'>Description</a></li>
</ul>


<p> <a href="../">&laquo; Return to documentation listing</a></p>
<?php
include_once("$topdir/includes/footer.inc");
