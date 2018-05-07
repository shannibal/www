from PySide import QtGui


class Main(QtGui.QDialog):
    def __init__(self, parent=None):
        super(Main, self).__init__(parent)
        QtGui.QLabel("deadlift")


if __name__ == '__main__':
    import sys
    app = QtGui.QApplication(sys.argv)
    main = Main()
    main.show()
    sys.exit(app.exec_())
