<?php
$topdir = "../../..";
$title = "MPI_Dims_create(3) man page (version 1.3.4)";

include_once("$topdir/doc/nav.inc");
include_once("$topdir/includes/header.inc");
?>
<p> <a href="../">&laquo; Return to documentation listing</a></p>
<PRE>
<!-- Manpage converted by man2html 3.0.1 -->

</PRE>
<H2>NAME</H2><PRE>
       <B>MPI_Dims_create</B>   -  Creates  a  division  of processors in a Cartesian
       grid.

</PRE>
<H2>SYNTAX</H2><PRE>

</PRE>
<H2>C Syntax</H2><PRE>
       #include &lt;mpi.h&gt;
       int MPI_Dims_create(int <I>nnodes</I>, int <I>ndims</I>, int <I>*dims</I>)

</PRE>
<H2>Fortran Syntax</H2><PRE>
       INCLUDE 'mpif.h'
       MPI_DIMS_CREATE(<I>NNODES,</I> <I>NDIMS,</I> <I>DIMS,</I> <I>IERROR</I>)
            INTEGER   <I>NNODES,</I> <I>NDIMS,</I> <I>DIMS(*),</I> <I>IERROR</I>

</PRE>
<H2>C++ Syntax</H2><PRE>
       #include &lt;mpi.h&gt;
       void Compute_dims(int <I>nnodes</I>, int <I>ndims</I>, int <I>dims</I>[])

</PRE>
<H2>INPUT PARAMETERS</H2><PRE>
       nnodes    Number of nodes in a grid (integer).

       ndims     Number of Cartesian dimensions (integer).

</PRE>
<H2>IN/OUT PARAMETER</H2><PRE>
       dims      Integer array of size ndims specifying the number of nodes in
                 each dimension.

</PRE>
<H2>OUTPUT PARAMETER</H2><PRE>
       IERROR    Fortran only: Error status (integer).

</PRE>
<H2>DESCRIPTION</H2><PRE>
       For  Cartesian  topologies, the function MPI_Dims_create helps the user
       select a balanced distribution of processes per  coordinate  direction,
       depending  on  the  number of processes in the group to be balanced and
       optional constraints that can be specified by the user. One use  is  to
       partition  all  the processes (the size of MPI_COMM_WORLD's group) into
       an n-dimensional topology.

       The entries in the array <I>dims</I> are set to describe a Cartesian grid with
       <I>ndims</I> dimensions and a total of <I>nnodes</I> nodes. The dimensions are set to
       be as close to each other as possible, using an appropriate  divisibil-
       ity  algorithm.  The caller may further constrain the operation of this
       routine by specifying elements of array dims. If dims[i] is  set  to  a
       positive  number,  the  routine  will not modify the number of nodes in
       dimension i; only those entries where  dims[i] = 0 are modified by  the
       call.

       Negative  input values of dims[i] are erroneous. An error will occur if
       nnodes is not a multiple of ((pi) over (i, dims[i] != 0)) dims[i].

       For dims[i] set by the call, dims[i] will be ordered  in  nonincreasing
       -----------------------------------------------------
       (0,0)     MPI_Dims_create(6, 2, dims)   (3,2)
       (0,0)     MPI_Dims_create(7, 2, dims)   (7,1)
       (0,3,0)   MPI_Dims_create(6, 3, dims)   (2,3,1)
       (0,3,0)   MPI_Dims_create(7, 3, dims)   erroneous call
       ------------------------------------------------------

</PRE>
<H2>ERRORS</H2><PRE>
       Almost all MPI routines return an error value; C routines as the  value
       of  the  function  and Fortran routines in the last argument. C++ func-
       tions do not return errors. If the default  error  handler  is  set  to
       MPI::ERRORS_THROW_EXCEPTIONS, then on error the C++ exception mechanism
       will be used to throw an MPI:Exception object.

       Before the error value is returned, the current MPI  error  handler  is
       called.  By  default, this error handler aborts the MPI job, except for
       I/O  function  errors.  The  error  handler   may   be   changed   with
       <a href="../man3/MPI_Comm_set_errhandler.3.php">MPI_Comm_set_errhandler</a>; the predefined error handler MPI_ERRORS_RETURN
       may be used to cause error values to be returned. Note  that  MPI  does
       not guarantee that an MPI program can continue past an error.

1.3.4                            Nov 11, 2009               <B>MPI_Dims_create(3)</B>
</PRE>

<p> <a href="../">&laquo; Return to documentation listing</a></p>
<?php
include_once("$topdir/includes/footer.inc");
