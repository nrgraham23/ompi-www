<?php
$topdir = "../../..";
$title = "MPI_Comm_get_name(3) man page (version 1.8)";
$meta_desc = "Open MPI v1.8 man page: MPI_COMM_GET_NAME(3)";

include_once("$topdir/doc/nav.inc");
include_once("$topdir/includes/header.inc");
?>
<p> <a href="../">&laquo; Return to documentation listing</a></p>
   <!-- manual page source format generated by PolyglotMan v3.2, -->
<!-- available at http://polyglotman.sourceforge.net/ -->

<body bgcolor='white'>
<a href='#toc'>Table of Contents</a><p>

<h2><a name='sect0' href='#toc0'>Name</a></h2>
<b>MPI_Comm_get_name</b> - Returns the name that was most recently associated
with a communicator.
<p>
<h2><a name='sect1' href='#toc1'>Syntax</a></h2>

<h2><a name='sect2' href='#toc2'>C Syntax</a></h2>
<br>
<pre>#include &lt;mpi.h&gt;
int MPI_Comm_get_name(MPI_Comm comm, char *comm_name, int *resultlen)
</pre>
<h2><a name='sect3' href='#toc3'>Fortran Syntax</a></h2>
<br>
<pre>INCLUDE &rsquo;mpif.h&rsquo;
MPI_COMM_GET_NAME(COMM, COMM_NAME, RESULTLEN, IERROR)
<tt> </tt>&nbsp;<tt> </tt>&nbsp;INTEGER<tt> </tt>&nbsp;<tt> </tt>&nbsp;COMM, RESULTLEN, IERROR
<tt> </tt>&nbsp;<tt> </tt>&nbsp;CHARACTER*(*) COMM_NAME
</pre>
<h2><a name='sect4' href='#toc4'>C++ Syntax</a></h2>
<br>
<pre>#include &lt;mpi.h&gt;
void MPI::Comm::Get_name(char* comm_name, int&amp; resultlen) const
</pre>
<h2><a name='sect5' href='#toc5'>Input Parameter</a></h2>

<dl>

<dt>comm </dt>
<dd>Communicator the name of which is to be returned (handle).

<p></dd>
</dl>

<h2><a name='sect6' href='#toc6'> Output Parameter</a></h2>

<dl>

<dt>comm_name </dt>
<dd>Name previously stored on the communicator,
or an empty string if no such name exists (string). </dd>

<dt>resultlen </dt>
<dd>Length of
returned name (integer).  </dd>

<dt>IERROR </dt>
<dd>Fortran only: Error status (integer).
<p>
</dd>
</dl>

<h2><a name='sect7' href='#toc7'>Description</a></h2>
MPI_Comm_get_name returns the last name that was previously
associated with the given communicator. The name may be set and retrieved
from any language. The same name will be returned independent of the language
used. <i>comm_name</i> should be allocated so that it can hold a resulting string
of length MPI_MAX_OBJECT_NAME characters. MPI_Comm_get_name returns a copy
of the set name in <i>comm_name</i>. <p>
If the user has not associated a name with
a communicator, or an error occurs, MPI_Comm_get_name will return an empty
string (all spaces in Fortran, "" in C and C++). The three predefined communicators
will have predefined names associated with them. Thus, the names of MPI_COMM_WORLD,
MPI_COMM_SELF, and MPI_COMM_PARENT will have the default of MPI_COMM_WORLD,
MPI_COMM_SELF, and MPI_COMM_PARENT. The fact that the system may have chosen
to give a default name to a communicator does not prevent the user from
setting a name on the same communicator; doing this removes the old name
and assigns the new one.
<p>
<h2><a name='sect8' href='#toc8'>Notes</a></h2>
It is safe simply to print the string returned
by MPI_Comm_get_name, as it is always a valid string even if there was
no name.  <p>
Note that associating a name with a communicator has no effect
on the semantics of an MPI program, and will (necessarily) increase the
store requirement of the program, since the names must be saved. Therefore,
there is no requirement that users use these functions to associate names
with communicators. However debugging and profiling MPI applications may
be made easier if names are associated with communicators, since the debugger
or profiler should then be able to present information in a less cryptic
manner.
<p>
<h2><a name='sect9' href='#toc9'>Errors</a></h2>
Almost all MPI routines return an error value; C routines
as the value of the function and Fortran routines in the last argument.
C++ functions do not return errors. If the default error handler is set
to MPI::ERRORS_THROW_EXCEPTIONS, then on error the C++ exception mechanism
will be used to throw an MPI::Exception object. <p>
Before the error value is
returned, the current MPI error handler is called. By default, this error
handler aborts the MPI job, except for I/O function errors. The error handler
may be changed with <a href="../man3/MPI_Comm_set_errhandler.3.php">MPI_Comm_set_errhandler</a>; the predefined error handler
MPI_ERRORS_RETURN may be used to cause error values to be returned. Note
that MPI does not guarantee that an MPI program can continue past an error.

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
<li><a name='toc6' href='#sect6'> Output Parameter</a></li>
<li><a name='toc7' href='#sect7'>Description</a></li>
<li><a name='toc8' href='#sect8'>Notes</a></li>
<li><a name='toc9' href='#sect9'>Errors</a></li>
</ul>


<p> <a href="../">&laquo; Return to documentation listing</a></p>
<?php
include_once("$topdir/includes/footer.inc");
