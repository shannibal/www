import json
from PySide import QtGui

template = {
    "block": {
        "week": {
            "day": {
                "exercise": {
                    "set": {
                    }
                }
            }
        }
    }
}

template = {
    "block": 1,
    "week": 1,
    "day": 1,
    "exercise": {
    }
}


def save_file(path, data):
    with open(path, 'w') as file:
        json.dump(data, file, indent=4, sort_keys=True)


def load_file(path):
    with open(path, 'r') as file:
        return json.load(file)


class Exercise(QtGui.QWidget):
    def __init__(self, parent=None):
        super(Exercise, self).__init__(parent)
        self._entries = [Entry() for i in range(3)]

    def setup(self):
        self.setLayout(QtGui.QGridLayout())
        self.layout().addWidget(QtGui.QLabel("deadlift"), 0, 0)
        for entry in self._entries:
            entry.setup()
            self.layout().addWidget(entry, self.layout().rowCount(), 1)
        self.layout().setContentsMargins(0, 0, 0, 0)
        self.layout().setSpacing(0)


class Entry(QtGui.QWidget):
    def __init__(self, parent=None):
        super(Entry, self).__init__(parent)
        self._text = QtGui.QLabel()
        self._sets = QtGui.QSpinBox()
        self._reps = QtGui.QSpinBox()

    def setup(self):
        self.setLayout(QtGui.QHBoxLayout())
        self.layout().addWidget(self._text)
        self.layout().addWidget(self._sets)
        self.layout().addWidget(self._reps)
        self.layout().setContentsMargins(0, 0, 0, 0)
        self.layout().setSpacing(0)


def _open():
    global instance
    instance = Exercise()
    instance.setup()
    instance.show()


if __name__ == '__main__':
    import sys
    save_file("C:/Temp/text.json", template)
    print load_file("C:/Temp/text.json")
    app = QtGui.QApplication(sys.argv)
    _open()
    sys.exit(app.exec_())
