<?php
$topdir = "../../..";
$title = "MPI_Win_c2f(3) man page (version 1.4.5)";
$meta_desc = "Open MPI v1.4.5 man page: MPI_WIN_C2F(3)";

include_once("$topdir/doc/nav.inc");
include_once("$topdir/includes/header.inc");
?>
<p> <a href="../">&laquo; Return to documentation listing</a></p>
  <!-- manual page source format generated by PolyglotMan v3.2, -->
<!-- available at http://polyglotman.sourceforge.net/ -->

<body bgcolor='white'>
<a href='#toc'>Table of Contents</a><p>

<h2><a name='sect0' href='#toc0'>Name</a></h2>
<b><a href="../man3/MPI_Comm_f2c.3.php">MPI_Comm_f2c</a>, <a href="../man3/MPI_Comm_c2f.3.php">MPI_Comm_c2f</a>, <a href="../man3/MPI_File_f2c.3.php">MPI_File_f2c</a>, <a href="../man3/MPI_File_c2f.3.php">MPI_File_c2f</a>, <a href="../man3/MPI_Info_f2c.3.php">MPI_Info_f2c</a>,
<a href="../man3/MPI_Info_c2f.3.php">MPI_Info_c2f</a>, <a href="../man3/MPI_Op_f2c.3.php">MPI_Op_f2c</a>, <a href="../man3/MPI_Op_c2f.3.php">MPI_Op_c2f</a>, <a href="../man3/MPI_Request_f2c.3.php">MPI_Request_f2c</a>, <a href="../man3/MPI_Request_c2f.3.php">MPI_Request_c2f</a>,
<a href="../man3/MPI_Type_f2c.3.php">MPI_Type_f2c</a>, <a href="../man3/MPI_Type_c2f.3.php">MPI_Type_c2f</a>, <a href="../man3/MPI_Win_f2c.3.php">MPI_Win_f2c</a>, MPI_Win_c2f </b> - Translates a C handle
into a Fortran handle, or vice versa.
<p>
<h2><a name='sect1' href='#toc1'>Syntax</a></h2>

<h2><a name='sect2' href='#toc2'>C Syntax</a></h2>
<br>
<pre>#include &lt;mpi.h&gt;
MPI_Comm <a href="../man3/MPI_Comm_f2c.3.php">MPI_Comm_f2c</a>(MPI_Fint comm)
MPI_Fint <a href="../man3/MPI_Comm_c2f.3.php">MPI_Comm_c2f</a>(MPI_Comm comm)
MPI_File <a href="../man3/MPI_File_f2c.3.php">MPI_File_f2c</a>(MPI_Fint file)
MPI_Fint <a href="../man3/MPI_File_c2f.3.php">MPI_File_c2f</a>(MPI_File file)
MPI_Group <a href="../man3/MPI_Group_f2c.3.php">MPI_Group_f2c</a>(MPI Fint group)
MPI_Fint <a href="../man3/MPI_Group_c2f.3.php">MPI_Group_c2f</a>(MPI Group group)
MPI_Info <a href="../man3/MPI_Info_f2c.3.php">MPI_Info_f2c</a>(MPI_Fint info)
MPI_Fint <a href="../man3/MPI_Info_c2f.3.php">MPI_Info_c2f</a>(MPI_Info info)
MPI_Op <a href="../man3/MPI_Op_f2c.3.php">MPI_Op_f2c</a>(MPI_Fint op)
MPI_Fint <a href="../man3/MPI_Op_c2f.3.php">MPI_Op_c2f</a>(MPI_Op op)
MPI_Request <a href="../man3/MPI_Request_f2c.3.php">MPI_Request_f2c</a>(MPI_Fint request)
MPI_Fint <a href="../man3/MPI_Request_c2f.3.php">MPI_Request_c2f</a>(MPI_Request request)
MPI_Datatype <a href="../man3/MPI_Type_f2c.3.php">MPI_Type_f2c</a>(MPI_Fint datatype)
MPI_Fint <a href="../man3/MPI_Type_c2f.3.php">MPI_Type_c2f</a>(MPI_Datatype datatype)
MPI_Win <a href="../man3/MPI_Win_f2c.3.php">MPI_Win_f2c</a>(MPI_Fint win)
MPI_Fint MPI_Win_c2f(MPI_Win win)
</pre>
<h2><a name='sect3' href='#toc3'>Description</a></h2>
Handles are passed between Fortran and C or C++ by using an
explicit C wrapper to convert Fortran handles to C handles. There is no
direct access to C or C++ handles in Fortran. Handles are passed between
C and C++ using overloaded C++ operators called from C++ code. There is
no direct access to C++ objects from C. The type definition <i>MPI_Fint</i> is
provided in C/C++ for an integer of the size that matches a Fortran <i>INTEGER</i>;
usually, <i>MPI_Fint</i> will be equivalent to <i>int</i>. The handle translation functions
are provided in C to convert from a Fortran handle (which is an integer)
to a C handle, and vice versa. <p>
For example, if <i>comm</i> is a valid Fortran handle
to a communicator, then <a href="../man3/MPI_Comm_f2c.3.php">MPI_Comm_f2c</a> returns a valid C handle to that same
communicator; if <i>comm</i> = MPI_COMM_NULL (Fortran value), then <a href="../man3/MPI_Comm_f2c.3.php">MPI_Comm_f2c</a>
returns a null C handle; if <i>comm</i> is an invalid Fortran handle, then <a href="../man3/MPI_Comm_f2c.3.php">MPI_Comm_f2c</a>
returns an invalid C handle.
<h2><a name='sect4' href='#toc4'>Note</a></h2>
This function does not return an error
value. Consequently, the result of calling it before <a href="../man3/MPI_Init.3.php">MPI_Init</a> or after <a href="../man3/MPI_Finalize.3.php">MPI_Finalize</a>
is undefined.  <p>

<hr><p>
<a name='toc'><b>Table of Contents</b></a><p>
<ul>
<li><a name='toc0' href='#sect0'>Name</a></li>
<li><a name='toc1' href='#sect1'>Syntax</a></li>
<li><a name='toc2' href='#sect2'>C Syntax</a></li>
<li><a name='toc3' href='#sect3'>Description</a></li>
<li><a name='toc4' href='#sect4'>Note</a></li>
</ul>


<p> <a href="../">&laquo; Return to documentation listing</a></p>
<?php
include_once("$topdir/includes/footer.inc");
