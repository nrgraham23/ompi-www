<?php
$topdir = "../../..";
$title = "MPI_Test(3) man page (version 1.7.4)";
$meta_desc = "Open MPI v1.7.4 man page: MPI_TEST(3)";

include_once("$topdir/doc/nav.inc");
include_once("$topdir/includes/header.inc");
?>
<p> <a href="../">&laquo; Return to documentation listing</a></p>
   <!-- manual page source format generated by PolyglotMan v3.2, -->
<!-- available at http://polyglotman.sourceforge.net/ -->

<body bgcolor='white'>
<a href='#toc'>Table of Contents</a><p>

<h2><a name='sect0' href='#toc0'>Name</a></h2>
<b>MPI_Test</b> - Tests for the completion of a specific send or receive.

<p>
<h2><a name='sect1' href='#toc1'>Syntax</a></h2>

<h2><a name='sect2' href='#toc2'>C Syntax</a></h2>
<br>
<pre>#include &lt;mpi.h&gt;
int MPI_Test(MPI_Request *request, int *flag, MPI_Status *status)
</pre>
<h2><a name='sect3' href='#toc3'>Fortran Syntax</a></h2>
<br>
<pre>INCLUDE &rsquo;mpif.h&rsquo;
MPI_TEST(REQUEST, FLAG, STATUS, IERROR)
<tt> </tt>&nbsp;<tt> </tt>&nbsp;LOGICAL<tt> </tt>&nbsp;<tt> </tt>&nbsp;FLAG
<tt> </tt>&nbsp;<tt> </tt>&nbsp;INTEGER<tt> </tt>&nbsp;<tt> </tt>&nbsp;REQUEST, STATUS(MPI_STATUS_SIZE), IERROR
</pre>
<h2><a name='sect4' href='#toc4'>C++ Syntax</a></h2>
<br>
<pre>#include &lt;mpi.h&gt;
bool Request::Test(Status&amp; status)
bool Request::Test()
</pre>
<h2><a name='sect5' href='#toc5'>Input Parameter</a></h2>

<dl>

<dt>request </dt>
<dd>Communication request (handle).
<p> </dd>
</dl>

<h2><a name='sect6' href='#toc6'>Output Parameters</a></h2>

<dl>

<dt>flag
</dt>
<dd>True if operation completed (logical). </dd>

<dt>status </dt>
<dd>Status object (status). </dd>

<dt>IERROR
</dt>
<dd>Fortran only: Error status (integer).
<p> </dd>
</dl>

<h2><a name='sect7' href='#toc7'>Description</a></h2>
A call to MPI_Test returns
flag = true if the operation identified by request is complete. In such
a case, the status object is set to contain information on the completed
operation; if the communication object was created by a nonblocking send
or receive, then it is deallocated and the request handle is set to MPI_REQUEST_NULL.
The call returns flag = false, otherwise. In this case, the value of the
status object is undefined. MPI_Test is a local operation.   <p>
The return status
object for a receive operation carries information that can be accessed
as described in Section 3.2.5 of the MPI-1 Standard, "Return Status." The status
object for a send operation carries information that can be accessed by
a call to <a href="../man3/MPI_Test_cancelled.3.php">MPI_Test_cancelled</a> (see Section 3.8 of the MPI-1 Standard, "Probe
and Cancel"). <p>
If your application does not need to examine the <i>status</i> field,
you can save resources by using the predefined constant MPI_STATUS_IGNORE
as a special value for the <i>status</i> argument.  <p>
One is allowed to call MPI_Test
with a null or inactive <i>request</i> argument. In such a case the operation returns
with <i>flag</i> = true and empty <i>status</i>. <p>
The functions <a href="../man3/MPI_Wait.3.php">MPI_Wait</a> and MPI_Test can
be used to complete both sends and receives.
<p>
<h2><a name='sect8' href='#toc8'>Notes</a></h2>
The use of the nonblocking
MPI_Test call allows the user to schedule alternative activities within
a single thread of execution. An event-driven thread scheduler can be emulated
with periodic calls to MPI_Test.
<p>
<h2><a name='sect9' href='#toc9'>Errors</a></h2>
Almost all MPI routines return
an error value; C routines as the value of the function and Fortran routines
in the last argument. C++ functions do not return errors. If the default
error handler is set to MPI::ERRORS_THROW_EXCEPTIONS, then on error the
C++ exception mechanism will be used to throw an MPI::Exception object.
<p>
Before the error value is returned, the current MPI error handler is called.
By default, this error handler aborts the MPI job, except for I/O function
errors. The error handler may be changed with <a href="../man3/MPI_Comm_set_errhandler.3.php">MPI_Comm_set_errhandler</a>, <a href="../man3/MPI_File_set_errhandler.3.php">MPI_File_set_errhandler</a>,
or <a href="../man3/MPI_Win_set_errhandler.3.php">MPI_Win_set_errhandler</a> (depending on the type of MPI handle that generated
the request); the predefined error handler MPI_ERRORS_RETURN may be used
to cause error values to be returned. Note that MPI does not guarantee that
an MPI program can continue past an error. <p>
Note that per MPI-1 section 3.2.5,
MPI exceptions on requests passed to MPI_TEST do not set the status.MPI_ERROR
field in the returned status.  The error code is passed to the back-end error
handler and may be passed back to the caller through the return value of
MPI_TEST if the back-end error handler returns it.  The pre-defined MPI error
handler MPI_ERRORS_RETURN exhibits this behavior, for example.
<p>
<h2><a name='sect10' href='#toc10'>See Also</a></h2>
<p>
<a href="../man3/MPI_Comm_set_errhandler.3.php">MPI_Comm_set_errhandler</a>
<br>
<a href="../man3/MPI_File_set_errhandler.3.php">MPI_File_set_errhandler</a> <br>
<a href="../man3/MPI_Testall.3.php">MPI_Testall</a> <br>
<a href="../man3/MPI_Testany.3.php">MPI_Testany</a> <br>
<a href="../man3/MPI_Testsome.3.php">MPI_Testsome</a> <br>
<a href="../man3/MPI_Wait.3.php">MPI_Wait</a> <br>
<a href="../man3/MPI_Waitall.3.php">MPI_Waitall</a> <br>
<a href="../man3/MPI_Waitany.3.php">MPI_Waitany</a> <br>
<a href="../man3/MPI_Waitsome.3.php">MPI_Waitsome</a> <br>
<a href="../man3/MPI_Win_set_errhandler.3.php">MPI_Win_set_errhandler</a> <br>

<p> <p>

<hr><p>
<a name='toc'><b>Table of Contents</b></a><p>
<ul>
<li><a name='toc0' href='#sect0'>Name</a></li>
<li><a name='toc1' href='#sect1'>Syntax</a></li>
<li><a name='toc2' href='#sect2'>C Syntax</a></li>
<li><a name='toc3' href='#sect3'>Fortran Syntax</a></li>
<li><a name='toc4' href='#sect4'>C++ Syntax</a></li>
<li><a name='toc5' href='#sect5'>Input Parameter</a></li>
<li><a name='toc6' href='#sect6'>Output Parameters</a></li>
<li><a name='toc7' href='#sect7'>Description</a></li>
<li><a name='toc8' href='#sect8'>Notes</a></li>
<li><a name='toc9' href='#sect9'>Errors</a></li>
<li><a name='toc10' href='#sect10'>See Also</a></li>
</ul>


<p> <a href="../">&laquo; Return to documentation listing</a></p>
<?php
include_once("$topdir/includes/footer.inc");
