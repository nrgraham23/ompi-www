<?php
$topdir = "../../..";
$title = "MPI_Alloc_mem(3) man page (version 1.7.4)";
$meta_desc = "Open MPI v1.7.4 man page: MPI_ALLOC_MEM(3)";

include_once("$topdir/doc/nav.inc");
include_once("$topdir/includes/header.inc");
?>
<p> <a href="../">&laquo; Return to documentation listing</a></p>
   <!-- manual page source format generated by PolyglotMan v3.2, -->
<!-- available at http://polyglotman.sourceforge.net/ -->

<body bgcolor='white'>
<a href='#toc'>Table of Contents</a><p>

<h2><a name='sect0' href='#toc0'>Name</a></h2>
<b>MPI_Alloc_mem </b> - Allocates a specified memory segment.
<p>
<h2><a name='sect1' href='#toc1'>Syntax</a></h2>

<h2><a name='sect2' href='#toc2'>C Syntax</a></h2>
<br>
<pre>#include &lt;mpi.h&gt;
int MPI_Alloc_mem(MPI_Aint size, MPI_Info info, void *baseptr)
</pre>
<h2><a name='sect3' href='#toc3'>Fortran Syntax (see FORTRAN NOTES)</a></h2>
<br>
<pre>INCLUDE &rsquo;mpif.h&rsquo;
MPI_ALLOC_MEM(SIZE, INFO, BASEPTR, IERROR)
<tt> </tt>&nbsp;<tt> </tt>&nbsp;INTEGER INFO, IERROR
<tt> </tt>&nbsp;<tt> </tt>&nbsp;INTEGER(KIND=MPI_ADDRESS_KIND) SIZE, BASEPTR
</pre>
<h2><a name='sect4' href='#toc4'>C++ Syntax</a></h2>
<br>
<pre>#include &lt;mpi.h&gt;
void* MPI::Alloc_mem(MPI::Aint size, const MPI::Info&amp; info)
</pre>
<h2><a name='sect5' href='#toc5'>Input Parameters</a></h2>

<dl>

<dt>size </dt>
<dd>Size of memory segment in bytes (nonnegative integer).
 </dd>

<dt>info </dt>
<dd>Info argument (handle).
<p> </dd>
</dl>

<h2><a name='sect6' href='#toc6'>Output Parameters</a></h2>

<dl>

<dt>baseptr </dt>
<dd>Pointer to beginning
of memory segment allocated.  </dd>

<dt>IERROR </dt>
<dd>Fortran only: Error status (integer).

<p> </dd>
</dl>

<h2><a name='sect7' href='#toc7'>Description</a></h2>
MPI_Alloc_mem allocates <i>size</i> bytes of memory. The starting
address of this memory is returned in the variable <i>base</i>.  <p>

<p>
<h2><a name='sect8' href='#toc8'>Fortran Notes</a></h2>
There
is no portable FORTRAN 77 syntax for using MPI_Alloc_mem. There is no portable
Fortran syntax for using pointers returned from MPI_Alloc_mem. However,
MPI_Alloc_mem can be used with Sun  Fortran compilers. <p>
From FORTRAN 77,
you can use the following non-standard  declarations for the SIZE and BASEPTR
arguments: <br>
<pre>           INCLUDE "mpif.h"
           INTEGER*MPI_ADDRESS_KIND SIZE, BASEPTR
</pre><p>
From either FORTRAN 77 or Fortran 90, you can use "Cray pointers"  for
the BASEPTR argument. Cray pointers are described further in  the Fortran
User&rsquo;s Guide and are supported by many Fortran compilers.   For example,
 <p>
<br>
<pre>           INCLUDE "mpif.h"
           REAL*4 A(100,100)
           POINTER (BASEPTR, A)
           INTEGER*MPI_ADDRESS_KIND SIZE
           SIZE = 4 * 100 * 100
           CALL MPI_ALLOC_MEM(SIZE,MPI_INFO_NULL,BASEPTR,IERR)
           ! use A
           CALL <a href="../man3/MPI_Free_mem.3.php">MPI_FREE_MEM</a>(A, IERR)
</pre>
<h2><a name='sect9' href='#toc9'>Java Notes</a></h2>
There is no Java syntax for using MPI_Alloc_mem.
<p>
<h2><a name='sect10' href='#toc10'>Errors</a></h2>
Almost
all MPI routines return an error value; C routines as the value of the
function and Fortran routines in the last argument. C++ functions do not
return errors. If the default error handler is set to MPI::ERRORS_THROW_EXCEPTIONS,
then on error the C++ exception mechanism will be used to throw an MPI::Exception
object. <p>
Before the error value is returned, the current MPI error handler
is called. By default, this error handler aborts the MPI job, except for
I/O function errors. The error handler may be changed with <a href="../man3/MPI_Comm_set_errhandler.3.php">MPI_Comm_set_errhandler</a>;
the predefined error handler MPI_ERRORS_RETURN may be used to cause error
values to be returned. Note that MPI does not guarantee that an MPI program
can continue past an error.
<p>
<h2><a name='sect11' href='#toc11'>See Also</a></h2>
<p>
<a href="../man3/MPI_Free_mem.3.php">MPI_Free_mem</a> <p>

<hr><p>
<a name='toc'><b>Table of Contents</b></a><p>
<ul>
<li><a name='toc0' href='#sect0'>Name</a></li>
<li><a name='toc1' href='#sect1'>Syntax</a></li>
<li><a name='toc2' href='#sect2'>C Syntax</a></li>
<li><a name='toc3' href='#sect3'>Fortran Syntax (see FORTRAN NOTES)</a></li>
<li><a name='toc4' href='#sect4'>C++ Syntax</a></li>
<li><a name='toc5' href='#sect5'>Input Parameters</a></li>
<li><a name='toc6' href='#sect6'>Output Parameters</a></li>
<li><a name='toc7' href='#sect7'>Description</a></li>
<li><a name='toc8' href='#sect8'>Fortran Notes</a></li>
<li><a name='toc9' href='#sect9'>Java Notes</a></li>
<li><a name='toc10' href='#sect10'>Errors</a></li>
<li><a name='toc11' href='#sect11'>See Also</a></li>
</ul>


<p> <a href="../">&laquo; Return to documentation listing</a></p>
<?php
include_once("$topdir/includes/footer.inc");
